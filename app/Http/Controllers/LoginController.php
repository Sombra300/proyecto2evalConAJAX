<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function signupFrom(): View
    {
        return view('auth.signup');
    }

    public function signup(SignupRequest $request): RedirectResponse
    {
        $user=new User();
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password=Hash::make($request->get('password'));
        $user->birthday=$request->get('birthday');
        $user->save();

        Auth::login($user);

        return redirect()->route('users.account');
    }

    public function loginFrom():View
    {
        if(Auth::viaRemember()){
            return 'Bienvenido de nuevo';
        }else if (Auth::check()){
            return view('users.account');
        }else{
            return view('auth.login');
        }
    }

    public function login(Request $request):View
    {
        $credentials =$request->only('email','password');
        if (Auth::guard('web')->attempt($credentials)){
            $request->session()->regenerate();
            return view('users.account');
        }else{
            $error='Error al acceder a la aplicación';
            return view('auth.login', compact('error'));
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
