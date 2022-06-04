<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('Auth.login');
    }

    public function showRegister()
    {
        return view('Auth.register');
    }

    public function login(LoginRequest $loginRequest)
    {
        $user = User::where('login', $loginRequest->get('login'))->first();

        if (!$user || $user->password !== $loginRequest->get('password')) return response()->redirectToRoute('showLogin')->withInput()->withErrors([
            'login' => [ 'Логин или пароль указаны неверно' ],
        ]);

        Auth::login($user);

        return response()->redirectToRoute('profile');
    }

    public function register(RegisterRequest $registerRequest)
    {
        $user = new User($registerRequest->only([
            'full_name',
            'login',
            'email',
            'password',
        ]));

        $user->save();

        return response()->redirectToRoute('login');
    }

    public function logout()
    {
        Auth::logout();

        return response()->redirectToRoute('welcome');
    }
}
