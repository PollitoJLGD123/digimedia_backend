<?php

use App\Http\Controllers\Api\ContactanosController;
use App\Http\Controllers\Api\ModalesController;
use App\Http\Controllers\Api\ReclamacionesController;
use App\Http\Controllers\Api\ServiciosController;
use App\Http\Controllers\Api\ModalServiciosController;
use Illuminate\Support\Facades\Route;

$urlApi = env("APP_API");

// Api Contactanos
// Ruta para obtener contactos con paginación (de 20 en 20)
Route::get($urlApi . '/contactanos', [ContactanosController::class, "get"]);
// Usar validacion para  los datos con VALIDATE de laravel
// Ruta para guardar contacto
Route::post($urlApi . '/contactanos', [ContactanosController::class, "create"]);
// Ruta para actualizar el estado de un contacto (de 0 a 1)
Route::put($urlApi . '/contactanos/{id}', [ContactanosController::class, "update"]);
// Ruta para eliminar un contacto por ID
Route::delete($urlApi . '/contactanos/{id}', [ContactanosController::class, "delete"]);


// Api Libro de reclamaciones  
// Ruta para obtener contactos con paginación (de 20 en 20)
Route::get($urlApi . '/reclamaciones', [ReclamacionesController::class, "get"]);
// Usar validacion para  los datos con VALIDATE de laravel
// Api para guardar información en el backend ( nompre, apellido, tipo documento, nmr documento, email, celular, direccion, distrito, ciudad, tipo de reclamo, servicio, reclamo, ckeck, acepta politica de privacidad)
Route::post($urlApi . '/reclamaciones', [ReclamacionesController::class, "create"]);
// Ruta para eliminar un contacto por ID
Route::delete($urlApi . '/reclamaciones/{id}', [ReclamacionesController::class, "delete"]);


// Api de Modales de contacto
// Ruta para obtener contactos con paginación (de 20 en 20)
Route::get($urlApi . '/modal', [ModalesController::class, "get"]);
// Usar validacion para  los datos con VALIDATE de laravel
// Api para guardar información en el backend (nombre, telefono, correo, servicio_id)
Route::post($urlApi . '/modal', [ModalesController::class, "create"]);
// Ruta para eliminar un contacto por ID
Route::delete($urlApi . '/modal/{id}', [ModalesController::class, "delete"]);


// Api de Modales de contacto
// Ruta para obtener contactos con paginación (de 20 en 20)
Route::get($urlApi . '/servicios', [ServiciosController::class, "get"]);
// Usar validacion para  los datos con VALIDATE de laravel
// Api para guardar información en el backend (nombre)
Route::post($urlApi . '/servicios', [ServiciosController::class, "create"]);
// Ruta para eliminar un contacto por ID
Route::delete($urlApi . '/servicios/{id}', [ServiciosController::class, "delete"]);


// Api de Modales de contacto
// Ruta para obtener contactos con paginación (de 20 en 20)
Route::get($urlApi . '/modalservicios', [ModalServiciosController::class, "get"]);
// Usar validacion para  los datos con VALIDATE de laravel
// Api para guardar información en el backend (nombre)
Route::post($urlApi . '/modalservicios', [ModalServiciosController::class, "create"]);
// Ruta para eliminar un contacto por ID
Route::delete($urlApi . '/modalservicios/{id}', [ModalServiciosController::class, "delete"]);


