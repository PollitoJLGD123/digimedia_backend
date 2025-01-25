<?php

use App\Http\Controllers\Api\ContactanosController;
use App\Http\Controllers\Api\ModalesController;
use App\Http\Controllers\Api\ReclamacionesController;
use App\Http\Controllers\Api\ServiciosController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Api Contactanos
// Ruta para obtener contactos con paginación (de 20 en 20)
Route::get('/contactanos', [ContactanosController::class, "get"]);
// Usar validacion para  los datos con VALIDATE de laravel
// Ruta para guardar contacto
Route::post('/contactanos', [ContactanosController::class, "create"]);
// Ruta para actualizar el estado de un contacto (de 0 a 1)
Route::put('/contactanos/{id}', [ContactanosController::class, "update"]);
// Ruta para eliminar un contacto por ID
Route::delete('/contactanos/{id}', [ContactanosController::class, "delete"]);


// Api Libro de reclamaciones  
// Ruta para obtener contactos con paginación (de 20 en 20)
Route::get('/reclamaciones', [ReclamacionesController::class, "get"]);
// Usar validacion para  los datos con VALIDATE de laravel
// Api para guardar información en el backend ( nompre, apellido, tipo documento, nmr documento, email, celular, direccion, distrito, ciudad, tipo de reclamo, servicio, reclamo, ckeck, acepta politica de privacidad)
Route::post('/reclamaciones', [ReclamacionesController::class, "create"]);
// Ruta para eliminar un contacto por ID
Route::delete('/reclamaciones/{id}', [ReclamacionesController::class, "delete"]);


// Api de Modales de contacto
// Ruta para obtener contactos con paginación (de 20 en 20)
Route::get('/modal', [ModalesController::class, "get"]);
// Usar validacion para  los datos con VALIDATE de laravel
// Api para guardar información en el backend (nombre, telefono, correo, servicio_id)
Route::post('/modal', [ModalesController::class, "create"]);
// Ruta para eliminar un contacto por ID
Route::delete('/modal/{id}', [ModalesController::class, "delete"]);


// Api de Modales de contacto
// Ruta para obtener contactos con paginación (de 20 en 20)
Route::get('/servicios', [ServiciosController::class, "get"]);
// Usar validacion para  los datos con VALIDATE de laravel
// Api para guardar información en el backend (nombre)
Route::post('/servicios', [ServiciosController::class, "create"]);
// Ruta para eliminar un contacto por ID
Route::delete('/servicios/{id}', [ServiciosController::class, "delete"]);


Route::post('/user', [UserController::class, "create"]);

