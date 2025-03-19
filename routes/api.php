<?php

use App\Http\Controllers\Api\ContactanosController;
use App\Http\Controllers\Api\ModalesController;
use App\Http\Controllers\Api\ReclamacionesController;
use App\Http\Controllers\Api\ServiciosController;
use App\Http\Controllers\Api\ModalServiciosController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Middleware\isAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/user/login', [UserController::class, "login"]);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::get('/user/logout', [UserController::class, "logout"]);

    //Para administradores
    Route::middleware('role:administrador')->group(function () {
        // Rutas - usuarios
        Route::get('/user', [UserController::class, "getAllByPage"]);
        Route::get('/user/{id}', [UserController::class, "getById"]);
        Route::post('/user', [UserController::class, "create"]);
        Route::put('/user/{id}', [UserController::class, "update"]);
        Route::put('/user/pass/{id}', [UserController::class, "updatePass"]);
        Route::delete('/user/{id}', [UserController::class, "delete"]);

        // Rutas - servicios
        Route::post('/servicios', [ServiciosController::class, "create"]);
        Route::put('/servicios/{id}', [ServiciosController::class, "update"]);
        Route::delete('/servicios/{id}', [ServiciosController::class, "delete"]);

        // Rutas - contactanos
        Route::delete('/contactanos/{id}', [ContactanosController::class, "delete"]);
        Route::put('/contactanos/{id}', [ContactanosController::class, "update"]);
        Route::delete('/reclamaciones/{id}', [ReclamacionesController::class, "delete"]);
        Route::delete('/modal/{id}', [ModalesController::class, "delete"]);

        Route::put('/reclamaciones/{id}', [ReclamacionesController::class, "update"]);
        
        Route::get('/reclamaciones/{id}', [ReclamacionesController::class, "getById"]);

        Route::get('/contactanos/{id}', [ContactanosController::class, "getById"]);
    });

    Route::middleware('role:ventas,marketing,administrador')->group(function () {
        // ver datos sin eliminar
        Route::get('/contactanos', [ContactanosController::class, "get"]);
        Route::get('/reclamaciones', [ReclamacionesController::class, "get"]);
        Route::get('/modal', [ModalesController::class, "get"]);
        Route::get('/servicios', [ServiciosController::class, "get"]);
    });
});

//publicas
Route::post('/contactanos', [ContactanosController::class, "create"]);
Route::post('/reclamaciones', [ReclamacionesController::class, "create"]);
Route::post('/modal', [ModalesController::class, "create"]);
