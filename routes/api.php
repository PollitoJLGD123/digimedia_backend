<?php

use App\Http\Controllers\Api\ContactanosController;
use App\Http\Controllers\Api\ModalesController;
use App\Http\Controllers\Api\ReclamacionesController;
use App\Http\Controllers\Api\ServiciosController;
use App\Http\Controllers\Api\ModalServiciosController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Api Contactanos
// Ruta para obtener contactos con paginación (de 20 en 20)
Route::get('/contactanos', [ContactanosController::class, "get"])->middleware('auth:sanctum');
// Usar validacion para  los datos con VALIDATE de laravel
// Ruta para guardar contacto
Route::post('/contactanos', [ContactanosController::class, "create"]);
// Ruta para actualizar el estado de un contacto (de 0 a 1)
Route::put('/contactanos/{id}', [ContactanosController::class, "update"])->middleware('auth:sanctum');
// Ruta para eliminar un contacto por ID
Route::delete('/contactanos/{id}', [ContactanosController::class, "delete"])->middleware('auth:sanctum');


// Api Libro de reclamaciones  
// Ruta para obtener contactos con paginación (de 20 en 20)
Route::get('/reclamaciones', [ReclamacionesController::class, "get"])->middleware('auth:sanctum');
// Usar validacion para  los datos con VALIDATE de laravel
// Api para guardar información en el backend ( nompre, apellido, tipo documento, nmr documento, email, celular, direccion, distrito, ciudad, tipo de reclamo, servicio, reclamo, ckeck, acepta politica de privacidad)
Route::post('/reclamaciones', [ReclamacionesController::class, "create"]);
// Ruta para eliminar un contacto por ID
Route::delete('/reclamaciones/{id}', [ReclamacionesController::class, "delete"])->middleware('auth:sanctum');


// Api de Modales de contacto
// Ruta para obtener contactos con paginación (de 20 en 20)
Route::get('/modal', [ModalesController::class, "get"])->middleware('auth:sanctum');
// Usar validacion para  los datos con VALIDATE de laravel
// Api para guardar información en el backend (nombre, telefono, correo, servicio_id)
Route::post('/modal', [ModalesController::class, "create"]);
// Ruta para eliminar un contacto por ID
Route::delete('/modal/{id}', [ModalesController::class, "delete"])->middleware('auth:sanctum');


// Api de Modales de contacto
// Ruta para obtener contactos con paginación (de 20 en 20)
Route::get('/servicios', [ServiciosController::class, "get"])->middleware('auth:sanctum');
// Usar validacion para  los datos con VALIDATE de laravel
// Api para guardar información en el backend (nombre)
Route::post('/servicios', [ServiciosController::class, "create"])->middleware('auth:sanctum');
// Ruta para actualizar el estado de un contacto (de 0 a 1)
Route::put('/servicios/{id}', [ServiciosController::class, "update"])->middleware('auth:sanctum');
// Ruta para eliminar un contacto por ID
Route::delete('/servicios/{id}', [ServiciosController::class, "delete"])->middleware('auth:sanctum');

//login de usuario
Route::post('/user/login', [UserController::class, "login"]);
// Ruta para obtener usuarios con paginación (de 20 en 20)
Route::get('/user', [UserController::class, "getAllByPage"])->middleware('auth:sanctum');
// Cerra sesion de usuario
Route::get('/user/logout', [UserController::class, "logout"])->middleware('auth:sanctum');
// Route::middleware(['auth:sanctum', 'token.expiration'])->get('/user', [UserController::class, "getAllByPage"]);
// Ruta para obtener usuario por id
Route::get('/user/{id}', [UserController::class, "getById"])->middleware('auth:sanctum');
// Ruta para crear un usuario con datos (name, email, password)
Route::post('/user', [UserController::class, "create"])->middleware('auth:sanctum');
// Ruta para crear un usuario con datos (name) y id por parametros
Route::put('/user/{id}', [UserController::class, "update"])->middleware('auth:sanctum');
// Ruta para actualizar contraseña de un usuario con datos (password) y id por parametros
Route::put('/user/pass/{id}', [UserController::class, "updatePass"])->middleware('auth:sanctum');
// Ruta para eliminar un usuario con id por parametros
Route::delete('/user/{id}', [UserController::class, "delete"])->middleware('auth:sanctum');


// // Api de Modales de contacto
// // Ruta para obtener contactos con paginación (de 20 en 20)
// Route::get('/modalservicios', [ModalServiciosController::class, "get"]);
// // Usar validacion para  los datos con VALIDATE de laravel
// // Api para guardar información en el backend (nombre)
// Route::post('/modalservicios', [ModalServiciosController::class, "create"]);
// // Ruta para actualizar el estado de un contacto (de 0 a 1)
// Route::put('/modalservicios/{id}', [ModalServiciosController::class, "update"]);
// // Ruta para eliminar un contacto por ID
// Route::delete('/modalservicios/{id}', [ModalServiciosController::class, "delete"]);



