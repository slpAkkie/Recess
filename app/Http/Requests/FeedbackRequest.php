<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    public function messages()
    {
        return [
            'first_name.required'   => 'Поле Имя не заполнено',
            'last_name.required'    => 'Поле Фамилия не заполнено',
            'email.required'        => 'Поле Email не заполнено',
            'email.email'           => 'Поле Email должно быть действительным адресом электронной почты',
            'message.required'      => 'Поле Сообщение не заполнено',
        ];
    }

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ];
    }
}
