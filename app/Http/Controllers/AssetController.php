<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetsRequest;
use Illuminate\Http\Request;
use App\Models\Assets;

class AssetController extends Controller
{
    public function store(AssetsRequest $request) {
       
        $data = $request->validated();

        $asset = Assets::query()->create($data);

        return response()->json([
            'data' => $asset,
            'message' => 'Актив успешно создан'
        ], 201);
    }


    public function index() {
        $assets = Assets::query()->paginate(15);

        return response()->json([
            'count' => count($assets),
            'assets' => $assets
        ],200);
    }


    public function show($id) {
        $asset = Assets::query()->find($id);

        if (!$asset) {
            return response()->json([
                'message' => 'Актив не найден'
            ], 404);
        }

        return response()->json([
            'data' => $asset
        ], 200);
    }

    public function update(Request $request, $id) {

        $asset = Assets::query()->find($id);
        
        if (!$asset) {
            return response()->json([
                'message' => 'Актив не найден'
            ], 404);
        }

        $data = $request->validate([
            'name' => ['nullable', 'string', "max:255"],
            'description' => ['nullable', 'string', "max:255"]
        ]);

        $asset = Assets::query()->update($data);

        return response()->json([
            'message' => 'Актив успешно обновлен'
        ], 200);
    }


    public function destroy($id) {
        $asset = Assets::query()->find($id);

        if (!$asset) {
            return response()->json([
                'message' => 'Актив не найден'
            ],404);
        }
        $asset = Assets::query()->delete();
       
        return response()->json([
            'message' => 'Актив успешно удален'
        ], 200);
        
    }


}
