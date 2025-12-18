<?php

namespace App\Http\Controllers;

use App\Models\Playlists;
use Illuminate\Http\Request;
use App\Http\Requests\PlaylistsRequest;
class PlaylistController extends Controller
{
    public function store(PlaylistsRequest $request) 
    { 
        $data = $request->validated();

        $playlist = Playlists::query()->create($data);

        return response()->json([
            'data' => $playlist,
            'message' => 'Плейлист успешно создан'
        ], 201);
    }


    public function index() 
    {
        $playlist = Playlists::query()->paginate(15);

        return response()->json([
            'data' => $playlist
        ], 200);
    }

    public function show($id) 
    {
        $playlist = Playlists::query()->find($id);

        if (!$playlist) {
            return response()->json([
                'message' => 'Плейлист не найден'
            ], 404);
        }

        return response()->json([
            'data' => $playlist
        ], 200);
    }

    public function update(PlaylistsRequest $request, $id) 
    {
        
        $data = $request->validated();

        $playlist  = Playlists::query()->find($id);

        if (!$playlist) {
            return response()->json([
                'message' => 'Плейлист не найден'
            ], 404);
        }


        $playlist = Playlists::query()->update($data);

        return response()->json([
            'message' => 'Плейлист успешно обновлен'
        ], 200);
    
    }

    public function destroy($id) {
        $playlists = Playlists::query()->find($id);

    if (!$playlists) {
        return response()->json([
            'message' => 'Плейлист не найден'
        ], 404);
    }
        $playlists = Playlists::query()->delete();

        return response()->json([
            'message' => 'Плейлист успешно удален'
        ], 200);

    }

}
