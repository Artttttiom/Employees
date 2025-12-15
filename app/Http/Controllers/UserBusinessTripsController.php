<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\UserBusinessTripRequest;
use App\Models\UserBusinessTrips;
class UserBusinessTripsController extends Controller
{
    public function store(UserBusinessTripRequest $request) {
    $data = $request->validated();
    
    $user_business_trips = UserBusinessTrips::create($data);
    
    return response()->json([
        'data' => $user_business_trips,
        'message' => 'Командировка успешно создана'
    ], 201);
}


    public function index() {
        $user_business_trips = UserBusinessTrips::query()->paginate(15);

        return response()->json([
            'data' =>  $user_business_trips
        ], 200);
    }

    public function show($id) {
        $user_business_trips = UserBusinessTrips::query()->find($id);

        if (!$user_business_trips) {
            return response()->json([
                'message' => 'Командировка не нейдена'
            ], 404);
        }

        return response()->json([
            'data' => $user_business_trips
        ], 200);
    }


    public function update(Request $request, $id) {
        $user_business_trips = UserBusinessTrips::query()->find($id);

        if (!$user_business_trips) {
            return response()->json([
                'message' => 'Командировка не найдена'
            ], 404);
        }
        $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string', 'max:255'],
        'asset_id' => ['required', 'exists:assets,id'],
        'user_id' => ['required', 'exists:users,id']
        ]);

        $user_business_trips = UserBusinessTrips::query()->update($data);

        return response()->json([
            'message' => 'Командировка обновлена'
        ], 200);
    }


    public function destroy($id) {
        $user_business_trips = UserBusinessTrips::query()->find($id);

        if (!$user_business_trips) {
            return response()->json([
            'message' => 'Командировка не найдена'
            ],404);
        }
        
        $user_business_trips = UserBusinessTrips::query()->delete();

        return response()->json([
            'message' => 'Командировка успешно удалена'
        ], 200);
    }



}
