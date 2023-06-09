<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cookie;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $data = $request->all();
        // echo "<pre>"; print_r($data); die;

        $request->authenticate();

        
      
    if(isset ($data['remember']) &&!empty($data['remember'])){
        setcookie ("email", $data ['email'], time() +36000);
        setcookie ("password",$data [ 'password'], time()+36000);
        setcookie ("remember", $data ['remember'], time()+36000);
    }else{
        setcookie ("email", "");
        setcookie("password", "");
        setcookie ("remember", "");
    }
   

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
