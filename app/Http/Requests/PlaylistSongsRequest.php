<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaylistSongsRequest extends FormRequest

{
    public function rules(): array
    {
        return [
            'song_id' => ['required', 'exists:songs.id'],
            'playlist_id' => ['required', 'exists:playlists.id']
        ];
    }

    public function messages(): array
    {
        return [
            'song_id.required' => 'Поле "song_id" является обязательным',
            'song_id.exists' => 'Данной песни не сущетвует',
            'playlist_id.required' => 'Поле "playlist_id" является обязательным',
            'playlist_id.exists' => 'Данного плейлиста не существует'
        ];
    }
}
