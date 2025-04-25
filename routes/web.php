<?php

use App\Http\Controllers\Todo\TodoController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// // });
// Route::get('/', function () {
//     return view('todo.app');
// });


Route::get('/todo', [TodoController::class, 'index']);
Route::post('/todo', [TodoController::class, 'store']);
