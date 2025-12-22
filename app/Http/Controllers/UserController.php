<?php

namespace App\Http\Controllers;
use App\Models\Users;
use App\Http\Requests\UsersRequest;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(UsersRequest $request) 
    {
        $data = $request->validated();

        $user = Users::query()->create($data);

        return response()->json([
            'data' => $user,
            'message' => 'Пользователь успешно создан'
        ], 201);
    }


    public function index(Request $request) 
    {
        $users = Users::query()->paginate(15);
        $usersNew = Users::query()
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
            'count' => count($users),
            'users' => $users
        ], 200);    
    }


    public function show($id) 
    {
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

    public function update(UsersRequest $request, $id) 
    {

        $data  = $request->validated();

        $user = Users::query()->find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Пользователь не найден'
            ], 404);
        }


        $user = Users::query()->update($data);

        return response()->json([
            'message' => 'Пользователь успешно обновлен'
        ], 200);
    }


    public function destroy($id) 
    {
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
