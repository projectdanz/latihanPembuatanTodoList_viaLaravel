<?php

use App\Http\Controllers\Todo\TodoController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// // });
// Route::get('/', function () {
//     return view('todo.app');
// });


Route::get('/todo', [TodoController::class, 'index'])->name('todo');
Route::post('/todo', [TodoController::class, 'store'])->name('todo.list');
Route::put('/todo/{id}', [TodoController::class, 'update'])->name('todo.update');
