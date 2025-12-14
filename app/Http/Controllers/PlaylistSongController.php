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
        
    }
}
