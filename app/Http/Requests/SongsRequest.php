<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['string', 'max:255'],
            'description' => ['string', 'max:255'],
            'performer' => ['string', 'max:255']
        ];
    }

    public function messages(): array
    {
        return [
        'title.string' => ['Поле "title" должно быть строкой'],
        'title.max' => ['Максимальная длина 255 символов'],
        'description.string' => ['Поле "description" должно быть строкой'],
        'description.max' => ['Максимальная длина 255 символов'],
        'performer.string' => ['Поле "performer" должно быть строкой'],
        'performer.max' => ['Максимальная длина 255 символов']
        ];
    }
}
