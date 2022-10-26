<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TasksController::class, 'show']);

Route::post('/tasks/create', [TasksController::class, 'create']);
Route::get('/tasks/delete/{id}', [TasksController::class, 'delete']);
Route::get('/tasks/select/{id}', [TasksController::class, 'select']);
Route::post('/tasks/update/{id}', [TasksController::class, 'update']);