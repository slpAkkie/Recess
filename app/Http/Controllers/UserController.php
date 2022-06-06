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
        $errors = [];

        /** @var User */
        $user = Auth::user();

        $q = User::where('id', '!=', $user->id);

        if ($updateUserRequest->has('email') && (clone $q)->where('email', $updateUserRequest->get('email'))->count() > 0)
            $errors['email'] = [ 'Этот Адрес электронной почты уже занят' ];

        if ($updateUserRequest->has('login') && (clone $q)->where('login', $updateUserRequest->get('login'))->count() > 0)
            $errors['login'] = [ 'Этот Логин уже занят' ];

        if ($updateUserRequest->has('phone') && (clone $q)->where('phone', $updateUserRequest->get('phone'))->count() > 0)
            $errors['phone'] = [ 'Этот Логин уже занят' ];

        if (count($errors)) return Redirect::back()->withInput()->withErrors($errors);

        $user->update(array_filter($updateUserRequest->only([
            'full_name',
            'login',
            'email',
            'phone',
            'password',
        ])));

        $updateUserRequest->session()->put('success', 'Ваши данные изменены');

        return response()->redirectToRoute('profile');
    }

    public function bookings()
    {
        /** @var User */
        $user = Auth::user();

        return view('User.bookings', [
            'bookings' => $user->bookings()->orderBy('created_at', 'DESC')->get(),
        ]);
    }
}
