<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeesRequest;
class EmployeesController extends Controller
{
    public function store(EmployeesRequest $request) 
    {

        $data = $request->validated();

        $employees = Employees::query()->create($data);

        return response()->json([
            'data' => $employees,
            'message' => 'Пользователь успешно создан'
        ], 201);
    }


    public function index() 
    {
        $employees = Employees::query()->paginate(15);

        return response()->json([
            'count' => count($employees),
            'employees' => $employees
        ],200);
    }


    public function categories() 
    {

        $categories = [
            'Manager' => [
                'id' => 1,
                'role' => 'Менеджер',
                'name' => 'Артем'
            ],
            'DeveДЩ' => [
                'id' => 2,
                'role' => 'Разработчик',
                'name' => 'Миша'
            ],
            'CEO' => [
                'id' => 3,
                'role' => 'СЕО',
                'name' => 'Виталик'
            ],
        ];

        return response()->json([
            'data' => $categories,
            'count' => count($categories)
        ], 200); 
    }
    public function show($id) 
    {
        $employee = Employees::query()->find($id);

        if ($employee->id % 2 == 0) {
        $message = "Это женщина";
        } else {
        $message = "Это мужчина";
}

        return response()->json([
            'data' => $employee,
            'message' => $message
        ], 200);
    }
}
