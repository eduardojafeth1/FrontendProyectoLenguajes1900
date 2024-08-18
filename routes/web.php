<?php


use App\Http\Controllers\InitController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\HomeController;


use Illuminate\Support\Facades\Route;
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
    return view('home');
});

//LogIn, Registro y Crear Cliente
Route::get('/hotel/login', [InitController::class, 'login'])->name('login');
Route::get('/hotel/registro', [InitController::class, 'registro'])->name('registro');

Route::post('/hotel/cliente/crear', [InitController::class, 'crearCliente'])->name('crearCliente');
Route::get('/hotel/cliente/todos', [InitController::class, 'obtenerClientes'])->name('obtenerTodos');
Route::get('/hotel/cliente/editar/{dni}', [InitController::class, 'editarCliente'])->name('editarCliente');
Route::post('/hotel/cliente/actualizar/{dni}', [InitController::class, 'actualizarCliente'])->name('actualizarCliente');
//Reserva
Route::get('/hotel/crear/vista', [ReservaController::class, 'vistaReserva'])->name('vistaReserva');
Route::post('/hotel/crear/reserva', [ReservaController::class, 'crearReserva'])->name('crearReserva');
Route::get('/hotel/editar/reserva/{cdg_reserva}', [ReservaController::class, 'editarReserva'])->name('editarReserva'); //editar reserva
Route::post('/hotel/actualizar/reserva/{cdg_reserva}', [ReservaController::class, 'actualizarReserva'])->name('actualizarReserva'); //actualizar reserva
Route::get('/hotel/reservas/registros', [ReservaController::class, 'obtenerReservas'])->name('registroReservas'); //actualizar reserva

//Habitaciones
//Route::POST('/habitacion/crear', [HabitacionController::class, 'crearHabitacion'])->name('crearHabitacion');

Route::get('/perfil', function () {
    return view('perfil');})->name('perfil');

Route::get('/reservas', function () {
    return view('reservas');})->name('reservas');

Route::get('/busqueda', function () {
    return view('busqueda');})->name('busqueda');





