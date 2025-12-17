<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetsRequest extends FormRequest 
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Название" является обязательным',
            'name.string' => 'Поле "Название" должно быть строкой',
            'name.max' => 'Максимальная длина 255 символов',
            'description.required' => 'Поле "Описание" является обязательным',
            'description.string' => 'Поле "Описание" должно быть строкой',
            'description.max' => 'Максимальная длина 255 символов',
        ];
    }

}