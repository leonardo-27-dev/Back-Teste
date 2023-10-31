<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\TarefasController;


//Start - User Routes
Route::controller(UsuariosController::class)->group(function () {
    Route::get('/listUser',  'index');
    Route::post('/createUser',  'store');
    Route::post('/login', 'login');
    Route::put('/updateUser/{id}',  'update');
    Route::delete('/deleteUser/{id}',  'delete');
});
//End - User Routes



//Start- Tasks Routes
Route::controller(TarefasController::class)->group(function () {
    Route::get('/listTask',  'index');
    Route::post('/createTask',  'store');
    Route::get('/listTask/{id}',  'show');
    Route::post('/updateTask/{id}',  'update');
    Route::delete('/deleteTask/{id}',  'delete');
});
//End- Tasks Routes
