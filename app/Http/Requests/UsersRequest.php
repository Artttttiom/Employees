<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'patronymic' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer']
        ];
    }

    public function messages(): array
    {
        return [
        'name.required' => ['Поле "name" является обязательным'],
        'name.string' => ['Поле "name" должно быть строкой'],
        'name.max' => ['Максимальная длина 255 символов'],
        'surname.required' => ['Поле "surname" является обязательным'],
        'surname.string' => ['Поле "surname" должно быть строкой'],
        'surname.max' => ['Максимальная длина 255 символов'],
        'patronymic.required' => ['Поле "patronymic" является обязательным'],
        'patronymic.string' => ['Поле "patronymic" должно быть строкой'],
        'patronymic.max' => ['Максимальная длина 255 символов'],
        'age.required' => ['Поле "age" является обязательным'],
        'age.integer' => ['Поле "age" должно быть числом'],
        ];
    }
}
