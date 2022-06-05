<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StuffRequest extends FormRequest
{
    public function messages()
    {
        return [
            'full_name.required'    => 'Поле Имя сотрудника должно быть заполнено',
            'position.required'     => 'Поле Должность должно быть заполнено',
            'description.required'  => 'Поле Описание должно быть заполнено',
            'avatar.required'       => 'Поле Фото должно быть заполнено',
            'avatar.file'           => 'Фотография должа быть файлом',
            'avatar.mimes'          => 'Файл должен быть одним из типов: jpg, jpeg, png',
        ];
    }

    public function rules()
    {
        return [
            'full_name' => 'required',
            'position' => 'required',
            'description' => 'required',
            'avatar' => 'nullable|file|mimes:jpg,jpeg,png',
        ];
    }
}
