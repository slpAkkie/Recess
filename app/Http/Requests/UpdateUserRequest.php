<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function messages() {
        return [
            'login.required'        => 'Поле Логин не заполнено',
            'full_name.required'    => 'Поле Имя не заполнено',
            'email.required'        => 'Поле Email не заполнено',
            'email.email'           => 'Поле Email должно быть действительным адресом электронной почты',
            'phone.required'        => 'Поле Номер телефона не заполнено',
            'phone.regex'           => 'Номер телефона должен должен состоять из 11 цифр и начинаться с 7 или 8',
            'password.confirmed'    => 'Пароли не совпадают',
        ];
    }

    public function rules()
    {
        return [
            'login'     => 'required',
            'full_name' => 'required',
            'email'     => 'required|email',
            'phone'     => 'required|unique:users,phone|regex:/^[78][0-9]{10}$/',
            'password'  => 'nullable|confirmed',
        ];
    }
}
