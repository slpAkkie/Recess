<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function messages()
    {
        return [
            'title.required'            => 'Поле Название не заполнено',
            'price_per_hour.required'   => 'Поле Цена за час не заполнено',
            'price_per_hour.integer'    => 'Поле Цена должно быть числом',
            'description.required'      => 'Поле Описание не заполнено',
            'type_id.required'          => 'Поле Вид съемки не заполнено',
            'type_id.exists'            => 'Вид съемки указан неверно',
        ];
    }

    public function rules()
    {
        return [
            'title'             => 'required',
            'price_per_hour'    => 'required|integer',
            'description'       => 'required',
            'type_id'           => 'required|exists:shooting_types,id',
        ];
    }
}
