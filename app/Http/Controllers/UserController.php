<?php

namespace App\Http\Controllers;
use App\Models\Users;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request) {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'patronymic' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer']
        ]);

        $user = Users::query()->create($data);

        return response()->json([
            'data' => $user,
            'message' => 'Пользователь успешно создан'
        ], 201);
    }


    public function index() {
        $users = Users::query()->with('UserBusinessTrips')->paginate(15);

        return response()->json([
            'count' => count($users),
            'users' => $users
        ], 200);    
    }


    public function show($id) {
        $user = Users::query()->find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Пользоваель не найден'
            ], 404);  
        }

        return response()->json([
            'data' => $user
        ], 200);
    }

    public function update(Request $request, $id) {
        $user = Users::query()->find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Пользователь не найден'
            ], 404);
        }

        $data  = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'surname' => ['nullable', 'string', 'max:255'],
            'patronymic' => ['nullable', 'string', 'max:255'],
            'age' => ['nullable', 'integer']
        ]);

        $user = Users::query()->update($data);

        return response()->json([
            'message' => 'Пользователь успешно обновлен'
        ], 200);
    }


    public function destroy($id) {
        $user = Users::query()->find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Пользователь не найден'
            ], 404);
        }
            $user = Users::query()->delete();

        return response()->json([
            'message' => 'Пользователь успешно удален'
        ], 200);
    }
}
