<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nTelemovel' => ['required', 'digits:9', 'unique:users'],
            'dataNascimento' => ['required', 'date'],
            'genero' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'cargo' => ['boolean', 'default:0'],
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nTelemovel' => $request->nTelemovel,
            'dataNascimento' => $request->dataNascimento,
            'genero' => $request->genero,
            'password' => Hash::make($request->password),
            'cargo' => $request->cargo ?? 0,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
