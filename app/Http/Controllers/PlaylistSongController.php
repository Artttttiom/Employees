<?php

namespace App\Http\Controllers;

use App\Models\PlaylistsSongs;
use Illuminate\Http\Request;

class PlaylistSongController extends Controller
{
     public function AddSongToPlaylist(Request $request) {
        $data = $request->validate([
            'song_id' => ['required', 'exists:songs.id'],
            'playlist_id' => ['required', 'exists:playlists.id']
        ]);

        $playlists_song = PlaylistsSongs::create($data);

        return response()->json([
            'message' => 'Песня успешно добавлена'
        ], 200);

    }

    public function DestroySongFromPlaylist(Request $request) {
        $data = $request->validate([
            'song_id' => ['required', 'exists:playlists_songs.song_id'],
            'playlist_id' => ['required', 'exists:playlists_songs.song_id']
        ]);

        $playlist_song = PlaylistsSongs::query()
        ->where('song_id',$data['song_id'])
        ->where('playlist_id', $data['playlist_id'])-delete();

        $playlist_song = PlaylistsSongs::query()->delete;

        return response()->json([
            'message' => 'Песня успешно удалена из плейлиста'
        ], 200);
    }
}

//Добавить файлы валидации на Песни, Плейлисты, Пользователей, Паганацию,Командировки,Активы
//Добавить сортировки и фильтрации в методы index Песни, Плейлисты, Пользователей, Паганацию,Командировки,Активы
//Добавить массив песен в получение плейслистов
//Добавить связь пользователь-плейслист->песни и возвращать пользователя с его плейслистами

