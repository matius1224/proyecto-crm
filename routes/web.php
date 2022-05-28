<?php

use Illuminate\Support\Facades\Route;
// use ;
// use App\Http\Controllers\EmpleadoController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/compañias', App\Http\Controllers\CompañiaController::class);
Route::resource('/empleados', App\Http\Controllers\EmpleadoController::class);

Route::get('/crearCompañia', [App\Http\Controllers\CompañiaController::class, 'store'])->name('crear.compañia');
Route::post('/crearCompañiav2', [App\Http\Controllers\CompañiaController::class, 'create'])->name('crear.compañiav2');
Route::get('/editCompañia', [App\Http\Controllers\CompañiaController::class, 'show'])->name('edit.compañia');
Route::post('/editarCompañia', [App\Http\Controllers\CompañiaController::class, 'edit'])->name('editar.compañia');
Route::post('/eliminarCompañia', [App\Http\Controllers\CompañiaController::class, 'destroy'])->name('eliminar.compañia');

Route::get('/crearEmpleado', [App\Http\Controllers\EmpleadoController::class, 'store'])->name('crear.empleado');
Route::post('/crearEmpleadov2', [App\Http\Controllers\EmpleadoController::class, 'create'])->name('crear.empleadov2');
Route::get('/editEmpleado', [App\Http\Controllers\EmpleadoController::class, 'show'])->name('edit.empleado');
Route::post('/editarEmpleado', [App\Http\Controllers\EmpleadoController::class, 'edit'])->name('editar.empleado');
Route::post('/eliminarEmpleado', [App\Http\Controllers\EmpleadoController::class, 'destroy'])->name('eliminar.empleado');