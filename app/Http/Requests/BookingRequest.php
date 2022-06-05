<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    public function messages()
    {
        return [
            'service_id.required'   => 'Поле Услуга должно быть заполненым',
            'service_id.exists'     => 'Такой услуги не существует',
            'date.required'         => 'Поле Дата бронирования должно быть заполненым',
            'date.date'             => 'Дата бронирования некорректна',
            'date.after'            => 'Дата бронирования не должна быть раньше сегодня',
            'total.required'        => 'Поле Итоговая сумма должно быть заполненым',
            'total.integer'         => 'Итоговая сумма не указана',
        ];
    }

    public function rules()
    {
        return [
            'service_id'    => 'required|exists:services,id',
            'date'          => 'required|date|after:today',
            'total'         => 'required|integer',
        ];
    }
}
