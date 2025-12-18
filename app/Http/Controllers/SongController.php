<?php

namespace App\Http\Controllers;

use App\Models\Songs;
use Illuminate\Http\Request;
use App\Http\Requests\SongsRequest;

class SongController extends Controller
{
    public function store(SongsRequest $request) 
    {

        $data = $request->validated();

        $song = Songs::query()->create($data);

        return response()->json([
            'data' => $song,
            'message' => 'Песня успешно создана'
        ], 201);
    }

    public function index() 
    {
        $songs = Songs::query()->paginate(15);

        return response()->json([
            'data' => $songs
        ],200);
    }


    public function show($id) 
    {
        $song = Songs::query()->find($id);

        if (!$song) {
            return response()->json([
                'message' => 'Песня не найдена'
            ], 404);
        }

        return response()->json([
            'data' => $song
        ], 200);
    }

    public function update(SongsRequest $request, $id) 
    {

        $data = $request->validated();

        $song = Songs::query()->find($id);

        if (!$song) {
            return response()->json([
                'message' => 'Песня не найдена'
            ], 404);
        }
       

        $song = Songs::query()->update($data);

        return response()->json([
            'message' => 'Песня успешно обновлена'
        ], 200);
    }

    public function destroy($id) 
    {
        $song = Songs::query()->find($id);

        if (!$song) {
            return response()->json([
                'message' => 'Песня не найдена'
            ], 404);
        }

        return response()->json([
            'message' => 'Песня успешно удалена'
        ], 200);
    } 

}
