<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function messages() {
        return [
            'login.required'    => 'Поле Логин не заполнено',
            'password.required' => 'Поле Пароль не заполнено',
        ];
    }

    public function rules()
    {
        return [
            'login'     => 'required',
            'password'  => 'required',
        ];
    }
}
