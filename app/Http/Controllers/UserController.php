<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function editProfile()
    {
        return view('User.editProfile', [
            'user' => Auth::user(),
        ]);
    }

    public function updateProfile(UpdateUserRequest $updateUserRequest)
    {
        /** @var User */
        $user = Auth::user();

        $errors = [];

        if ($updateUserRequest->has('email') && ($user = User::where('email', $updateUserRequest->get('email'))->first()) && $user->id !== Auth::id())
            $errors['email'] = [ 'Этот Адрес электронной почты уже занят' ];

        if ($updateUserRequest->has('login') && ($user = User::where('login', $updateUserRequest->get('login'))->first()) && $user->id !== Auth::id())
            $errors['login'] = [ 'Этот Логин уже занят' ];

        if (count($errors)) return Redirect::back()->withInput()->withErrors($errors);

        $user->update(array_filter($updateUserRequest->only([
            'full_name',
            'login',
            'email',
            'password',
        ])));

        $updateUserRequest->session()->put('success', 'Ваши данные изменены');

        return response()->redirectToRoute('profile');
    }
}
