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


    public function index(Request $request) 
    {
        $playlist = Playlists::query()->paginate(15);
        $playlistNew = Playlists::query()
        ->when($request['sort'] && $request['field'], function ($query) use ($request) {
            return $query->orderBy($request['field'], $request['sort']);
        })
        ->when(!empty($request['start_date']) && !empty($request['end_date']), function ($query) use ($request) {
            return $query->whereBetween('created_at', [$request['start_date'], $request['end_date']]);
        })
        ->when(!empty($request['dates']), function ($query) use ($request) {
            return $query->whereBetween('created_at', $request['dates']);
        })
        ->get();

        return response()->json([
            'data' => $playlistNew
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
