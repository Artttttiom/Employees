<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\PlaylistSongController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserBusinessTripsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Сотрудники
Route::post('employee', [EmployeesController::class, 'store']);
Route::get('employees', [EmployeesController::class, 'index']);
Route::get('categories', [EmployeesController::class, 'categories']);
Route::get('gender/{id}', [EmployeesController::class, 'show']);

//Активы
Route::post('asset',[AssetController::class, 'store']);
Route::patch('asset/{id}',[AssetController::class, 'update']);
Route::get('assets',[AssetController::class, 'index']);
Route::get('asset/{id}',[AssetController::class, 'show']);
Route::delete('asset/{id}',[AssetController::class, 'destroy']);

//Пользователь
Route::post('user', [UserController::class, 'store']);
Route::patch('user/{id}', [UserController::class, 'update']);
Route::get('users',[UserController::class, 'index']);
Route::get('user/{id}',[UserController::class, 'show']);
Route::delete('user/{id}', [UserController::class, 'destroy']);

//Командировки пользователей
Route::post('create-business-trip', [UserBusinessTripsController::class, 'store']);
Route::patch('update-business-trip/{id}', [UserBusinessTripsController::class, 'update']);
Route::get('user-business-trips', [UserBusinessTripsController::class, 'index']);
Route::get('user-business-trip/{id}', [UserBusinessTripsController::class, 'show']);
Route::delete('delete-business-trip/{id}', [UserBusinessTripsController::class, 'destroy']);

//Песни
Route::post('song', [SongController::class, 'store']);
Route::patch('song/{id}', [SongController::class, 'update']);
Route::get('songs', [SongController::class, 'index']);
Route::get('song/{id}', [SongController::class, 'show']);
Route::delete('song/{id}', [SongController::class, 'destroy']);

//Плейлисты
Route::post('playlist', [PlaylistController::class, 'store']);
Route::patch('playlist/{id}', [PlaylistController::class, 'update']);
Route::get('playlists', [PlaylistController::class, 'index']);
Route::get('playlists/{id}', [PlaylistController::class, 'show']);
Route::delete('playlist/{id}', [PlaylistController::class, 'destroy']);
Route::post('add-song', [PlaylistSongController::class, 'AddSongToPlaylist']);