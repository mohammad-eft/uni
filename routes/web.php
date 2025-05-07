<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TechersController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\StudentsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('home');
});

Route::get('/teachers/login', [TechersController::class, "create"]);
Route::post('/teachers/submit', [TechersController::class, "store"]);
Route::get('/teachers', [TechersController::class, 'index']);
Route::get('/teachers/show/{id}', [TechersController::class, 'show']);
Route::get('/teachers/edit/{id}', [TechersController::class, 'edit']);
Route::post('/teacher/update', [TechersController::class, 'update']);
Route::get('/teachers/delete/{id}', [TechersController::class, 'delete']);
Route::get('/teachers/show_units/{id}', [TechersController::class, 'show_units']);

Route::get('/units/create', [UnitController::class, "create"]);
Route::post('/units/submit', [UnitController::class, "store"]);
Route::get('/units', [UnitController::class, 'index']);
Route::get('/units/show/{id}', [UnitController::class, 'show']);
Route::get('/units/edit/{id}', [UnitController::class, 'edit']);
Route::post('/unit/update', [UnitController::class, 'update']);
Route::get('/units/delete/{id}', [UnitController::class, 'delete']);

Route::get('/students/login', [StudentsController::class, "create"]);
Route::post('/students/submit', [StudentsController::class, "store"]);
Route::get('/students', [StudentsController::class, 'index']);
Route::get('/students/show/{id}', [StudentsController::class, 'show']);
Route::get('/students/edit/{id}', [StudentsController::class, 'edit']);
Route::post('/student/update', [StudentsController::class, 'update']);
Route::get('/students/delete/{id}', [StudentsController::class, 'delete']);