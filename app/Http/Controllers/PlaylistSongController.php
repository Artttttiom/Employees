<?php

namespace App\Http\Controllers;

use App\Models\PlaylistsSongs;
use Illuminate\Http\Request;
use App\Http\Requests\PlaylistSongsRequest;

class PlaylistSongController extends Controller
{
     public function AddSongToPlaylist(PlaylistSongsRequest $request) 
     {
        
        $data = $request->validated();

        $playlists_song = PlaylistsSongs::create($data);

        return response()->json([
            'message' => 'Песня успешно добавлена'
        ], 200);

    }

    public function DestroySongFromPlaylist(PlaylistSongsRequest $request) 
    {
        
        $data = $request->validated();

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

