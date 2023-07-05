<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;

class UserController extends Controller
{
    public function index()
{
    $users = User::all();
    
    // return view('listUsers', compact('users'));
    return [
        "status" => 1,
        "data" => $users
    ];
}

    public function create()
{
    return view('userCreate');
}

    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'nTelemovel' => 'required|string|max:255|unique:users,nTelemovel',
        'dataNascimento' => 'required|date',
        'genero' => 'required|string',
        'password' => ['required', Rules\Password::defaults()],
        'cargo' => 'nullable|boolean',
    ]);

    $user = new User([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'nTelemovel' => $request->input('nTelemovel'),
        'dataNascimento' => $request->input('dataNascimento'),
        'genero' => $request->input('genero'),
        'password' => Hash::make($request->input('password')),
        'cargo' => $request->input('cargo'),
    ]);

    $user->save();

    return redirect()->route('users');
}

    public function edit($id)
{
    $user = User::find($id);

    return view('userEdit', ['user' => $user]);
}

    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$user->id,
        'nTelemovel' => 'required|string|max:255',
        'dataNascimento' => 'required|date',
        'genero' => 'required|string',
        'cargo' => 'nullable|boolean',
    ]);

    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->nTelemovel = $request->input('nTelemovel');
    $user->dataNascimento = $request->input('dataNascimento');
    $user->genero = $request->input('genero');
    $user->cargo = $request->input('cargo');

    $user->save();

    return redirect()->route('users');
}

    public function destroy($id)
{
    $user = User::find($id);
    $user->delete();

    return redirect()->route('users');
}

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication successful
        $user = Auth::user();

        return response()->json([
            'success' => true,
            'message' => 'Logged in successfully',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                // Include any other user information you want to share
            ]
        ]);
    } else {
        // Authentication failed
        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials'
        ], 401);
    }
}

    public function register(Request $request)
{
    $info = $request->only('nome', 'email', 'nTelemovel', 'dataNascimento', 'genero', 'password');

    $existingUser = User::where('email', $info['email'])->first();
    if ($existingUser) {
        return response()->json([
            'success' => false,
            'message' => 'Email already registered'
        ], 401);
    }

    $user = User::create([
        'name' => $info['nome'],
        'email' => $info['email'],
        'nTelemovel' => $info['nTelemovel'],
        'dataNascimento' => $info['dataNascimento'],
        'genero' => $info['genero'],
        'password' => Hash::make($info['password']),
        'cargo' => 0,
    ]);

    $user->save();

    return response()->json([
        'success' => true,
        'message' => 'Account registered successfully',
    ]);

}

    public function sendEmail(Request $request) 
{
    $userEmail = $request->input('email');
    $user = User::where('email', $userEmail)->first();
    $userId = $user->id;

    $link = 'http://127.0.0.1:8000/password-reset/' . $userId;

    if (!$user) {
        return redirect()->route('welcome')->with('message', 'Não existe nenhum email no nosso sistema.');
    }

    $mail = new PHPMailer(true); // Passing `true` enables exceptions
        
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->setLanguage('pt');
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'diogomagalhaesestagio@gmail.com';
    $mail->Password = 'ouugxtvdqzpohffv';
    $mail->Port = 587;
    $mail->setFrom('diogomagalhaesestagio@gmail.com');
    $mail->addReplyTo('rdiogomagalhaesestagio@gmail.com');
    $mail->addAddress($userEmail, 'Utilizador');
    $mail->isHTML(true);
    $mail->Subject = 'Recuperação da Password';
    $mail->Body = 'Para dar reset à password, aceda ao seguinte link ' . $link;
    $mail->CharSet = 'UTF-8';   
    $mail->altBody = '';

    if (!$mail->send()) {
        return redirect()->route('welcome')->with('message', 'erro');
    } else {
        return redirect()->route('welcome')->with('mensagem', 'Verificar Email');
    }
}

    public function updatePassword (Request $request, $userId)
{
    $userId = $request->route('id');
    $password = $request->input('password');
    $confirm_password = $request->input('password_confirmation');

    if ($password != $confirm_password) {
        return redirect()->route('welcome')->with('message', 'As passwords não são iguais');
    }

    $user = User::where('id', $userId)->first();
    $user->forceFill([
        'password' => Hash::make($password)
    ])->save();

    return redirect()->route('login')->with('mensagem', 'Password alterada com sucesso.'); 
}

    public function updateMobilePassword (Request $request) 
{
    $data = $request->json()->all();
    $userId = $data['userId'];
    $password = $data['password'];
    $confirm_password = $data['confirm_password'];

    if ($password != $confirm_password) {
        return response()->json(['message' => 'As passwords não são iguais.'], 400);
    }

    $user = User::where('id', $userId)->first();
    $user->forceFill([
        'password' => Hash::make($password)
    ])->save();

    return response()->json(['message' => 'Password atualizada com sucesso.'], 200);
}

    public function show($userId)
{
    $specificUser = User::where('id', $userId)->first();
    
    if($specificUser) {
    	return [
            "status" => 1,
            "data" => $specificUser
        ];
    } else {
    	return [
            "status" => 2,
            "message" => "Não encontrado"
        ];
    }
}

}
