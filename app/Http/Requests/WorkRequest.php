<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
{
    public function messages()
    {
        return [
            'title.required'                => 'Поле Название не заполнено',
            'type_id.required'              => 'Поле Вид съемки не заполнено',
            'type_id.exists'                => 'Вид съемки указан неверно',
            'country.required'              => 'Поле Страна за час не заполнено',
            'city.required'                 => 'Поле Город не заполнено',
            'shooted_at.required'           => 'Поле Дата съемки не заполнено',
            'shooted_at.before_or_equal'    => 'Поле Дата съемки не может быть позже сегодня',
        ];
    }

    public function rules()
    {
        return [
            'title'         => 'required',
            'type_id'       => 'required|exists:shooting_types,id',
            'country'       => 'required',
            'city'          => 'required',
            'shooted_at'    => 'required|date|before_or_equal:today'
        ];
    }
}
