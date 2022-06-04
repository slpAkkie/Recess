<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function messages() {
        return [
            'login.required'        => 'Поле Логин не заполнено',
            'full_name.required'    => 'Поле Имя не заполнено',
            'email.required'        => 'Поле Email не заполнено',
            'email.email'           => 'Поле Email должно быть действительным адресом электронной почты',
            'password.required'     => 'Поле Пароль не заполнено',
            'password.confirmed'    => 'Пароли не совпадают',
        ];
    }

    public function rules()
    {
        return [
            'login'     => 'required',
            'full_name' => 'required',
            'email'     => 'required|email',
            'password'  => 'required|confirmed',
        ];
    }
}
