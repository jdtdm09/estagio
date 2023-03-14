<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index()
{
    $users = User::all();
    
    return view('listUsers', compact('users'));
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



}
