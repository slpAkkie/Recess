<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CallbackRequest extends FormRequest
{
    public function messages()
    {
        return [
            'email.required'        => 'Поле Email не заполнено',
            'email.email'           => 'Поле Email должно быть действительным адресом электронной почты',
        ];
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
        ];
    }
}
