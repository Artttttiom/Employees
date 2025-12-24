<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetsRequest;
use Illuminate\Http\Request;
use App\Models\Assets;

class AssetController extends Controller
{
    public function store(AssetsRequest $request) 
    {
       
        $data = $request->validated();

        $asset = Assets::query()->create($data);

        return response()->json([
            'data' => $asset,
            'message' => 'Актив успешно создан'
        ], 201);
    }


    public function index(Request $request) 
    {
        $assets = Assets::query()->paginate(15);
        $assetNew = Assets::query()
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
            'count' => count($$assetNew),
            'assets' => $$assetNew
        ],200);
    }


    public function show($id) 
    {
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

    public function update(AssetsRequest $request, $id) 
    {
        $data = $request->validated();

        $asset = Assets::query()->find($id);
        
        if (!$asset) {
            return response()->json([
                'message' => 'Актив не найден'
            ], 404);
        }

        $asset = Assets::query()->update($data);

        return response()->json([
            'message' => 'Актив успешно обновлен'
        ], 200);
    }


    public function destroy($id) 
    {
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
