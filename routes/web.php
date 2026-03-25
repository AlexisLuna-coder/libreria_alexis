<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AuthController; //NUEVO CONTROLADOR - 2026/02/25

Route::get('/', function () {
    return view('welcome');
});

//DOBLE :: ES UN OPERADOR DE RELACIÓN ENTRE CLASES, SE USA PARA LLAMAR A UN MÉTODO O UNA PROPIEDAD DE UNA CLASE
//2026-03-04
Route::middleware(['auth'])->group(function () {
    // ! RUTA PARA OBTENER LOS METODOS DE LIBRO CONTROLLER
    Route::resource('libros', LibroController::class);
});

// RUTA PARA MOSTRAR CATALOGO DE LIBROS
Route::get('/home', [
    LibroController::class, 'home'
])->name('home');

// ! RUTA PARA OBTENER LA INFORMACIÓN DE UN SOLO LIBRO
//*: Se escribe la ruta como queremos que se escriba en el navegador
Route::get('/libros/{id}/edit', [
    LibroController::class, 'edit'
])->name('libros.edit'); // ! RUTA PARA EDITAR UN LIBRO, SE USA EL MÉTODO EDIT DEL LIBRO CONTROLLER

//!: RUTA PARA ACTUALIZAR EL LIBRO
//METOOD DE HTTP QUE VA A USAR
Route::put('/libros/{id}', [
    LibroController::class, 'update'
])->name('libros.update'); // ! RUTA PARA ACTUALIZAR UN LIBRO, SE USA EL MÉTODO UPDATE DEL LIBRO CONTROLLER


// * RUTA PARA MOSTRAR EL FORMULARIO DE REGISTRO DE USUARIOS
Route::get('/registro', [
    AuthController::class, 'registerForm'
])->name('registro');
//TANTO LA RUTA COMO LA RUTA DE LA URL PODRÍA SER EL MISMOPARA EVITAR CONFUSIONES

//Ruta para manejar el registro del usuario
//SE PUEDE DEJAR EL MISMO NOMBRE SI EL TIPO DE HTTP ESTE CAMBIANDO; DE LO CONTRARIO NO
Route::post('/registro', [
    AuthController::class, 'register'
])->name('registro.store');

//Ruta para mostrar el formulario de inciio de sesión
Route::get('/acceso', [
    AuthController::class, 'loginForm'
])->name('acceso');

//Ruta para verificar el inicio de seión
Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');


// 2026-03-03
//Ruta para cerra sesión
Route::post('/cerrar', [
    AuthController::class, 'logout'
])->name('cerrar');



//Con esto se indica el uso de dos MIDDLEWORE, EL DE AUTENTICACIÓN Y ADMINISTRADOR
Route::middleware(['auth', 'admin'])->group(function () {
    //Ruta para el panel de administrador
    Route::get('/admin-dashboard', [
        AuthController::class, 'adminDashboard' //Clase y nombre del método
    ]) -> name('admin-dashboard');
});
