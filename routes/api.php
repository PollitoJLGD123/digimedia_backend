<?php

use App\Http\Controllers\Api\ContactanosController;
use App\Http\Controllers\Api\ModalesController;
use App\Http\Controllers\Api\ReclamacionesController;
use App\Http\Controllers\Api\ServiciosController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EmpleadoController;
use App\Http\Controllers\Api\RolController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\BlogBodyController;
use App\Http\Controllers\Api\BlogFooterController;
use App\Http\Controllers\Api\BlogHeadController;
use App\Http\Controllers\Api\TarjetaController;
use App\Http\Controllers\Api\CommendTarjetaController;

use App\Http\Middleware\isAdmin;
use App\Models\CommendTarjeta;
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
        Route::delete('/servicios/{id}', [ServiciosController::class, "delete"]);

        // Rutas - contactanos
        Route::delete('/contactanos/{id}', [ContactanosController::class, "delete"]);
        Route::delete('/reclamaciones/{id}', [ReclamacionesController::class, "delete"]);
        Route::delete('/modales/{id}', [ModalesController::class, "delete"]);


        // Rutas - empleados
        Route::get('/empleados', [EmpleadoController::class, "getAllByPage"]);
        Route::get('/empleados/{id}', [EmpleadoController::class, "getById"]);
        Route::post('/empleados', [EmpleadoController::class, "create"]);
        Route::put('/empleados/{id}', [EmpleadoController::class, "update"]);
        Route::put('/empleados/pass/{id}', [EmpleadoController::class, "updatePass"]);
        Route::delete('/empleados/{id}', [EmpleadoController::class, "delete"]);


        //Rutas - Roles
        Route::get('/roles', [RolController::class, "index"]);


    });

    Route::middleware('role:ventas,marketing,administrador')->group(function () {
        // ver datos sin eliminar
        Route::get('/contactanos', [ContactanosController::class, "get"]);
        Route::get('/reclamaciones', [ReclamacionesController::class, "get"]);
        Route::get('/modales', [ModalesController::class, "get"]);
        Route::get('/servicios', [ServiciosController::class, "get"]);

        //getById
        Route::get('/reclamaciones/{id}', [ReclamacionesController::class, "getById"]);
        Route::get('/contactanos/{id}', [ContactanosController::class, "getById"]);
        Route::get('/modales/{id}', [ModalesController::class, "getById"]);

        // actualizar datos
        Route::put('/contactanos/{id}', [ContactanosController::class, "update"]);
        Route::put('/servicios/{id}', [ServiciosController::class, "update"]);
        Route::put('/reclamaciones/{id}', [ReclamacionesController::class, "update"]);
        Route::put('/modales/{id}', [ModalesController::class, "update"]);

        //creación (depende :v)
        Route::post('/servicios', [ServiciosController::class, "create"]);

        //blogs creacion
        Route::post('/blog_head', [BlogHeadController::class, "create"]);
        Route::post('/blog_body', [BlogBodyController::class, "create"]);
        Route::post('/blog_footer', [BlogFooterController::class, "create"]);
        Route::post('/commend_tarjeta', [CommendTarjetaController::class, "create"]);
        Route::post('/tarjeta', [TarjetaController::class, "create"]);

        //blogs delete
        Route::delete('/cards/{id}', [CardController::class, "destroy"]);
        Route::delete('/blogs/{id}', [BlogController::class, "destroy"]);
        Route::delete('/blog_head/{id}', [BlogHeadController::class, "destroy"]);
        Route::delete('/blog_body/{id}', [BlogBodyController::class, "destroy"]);
        Route::delete('/blog_footer/{id}', [BlogFooterController::class, "destroy"]);
        Route::delete('/commend_tarjeta/{id}', [CommendTarjetaController::class, "destroy"]);
        Route::delete('/tarjetas_delete/{id}', [TarjetaController::class, "destroyAll"]);
        //Route::delete('/tarjetas_delete/{id}', [TarjetaController::class, "destroy"]);
    });
});

//publicas
Route::post('/empleados/verify-password', [EmpleadoController::class, 'verifyPassword']);
Route::post('/contactanos', [ContactanosController::class, "create"]);
Route::post('/reclamaciones', [ReclamacionesController::class, "create"]);
Route::post('/modales', [ModalesController::class, "create"]);
Route::post('/reset_password', action: [AuthController::class, "forgotPassword"]);
Route::post('/update_password', action: [AuthController::class, "updatePassword"]);

//blogs obtener
Route::get('/cards', [CardController::class, "index"]);
Route::get('/blogs/{id}', [BlogController::class, "show"]);
Route::get('/blogs', [BlogController::class, "index"]);
