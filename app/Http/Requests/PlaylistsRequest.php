<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaylistsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'user_id' => ['required', 'exists:users.id']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "name" является обязательным',
            'name.string' => 'Поле "name" должно быть строкой'
        ];
    }
}
