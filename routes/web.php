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
Route::get('/init/login', [InitController::class, 'login'])->name('login');
Route::get('/init/registro', [InitController::class, 'registro'])->name('registro');
Route::post('/api/crear-cliente', [InitController::class, 'crearCliente'])->name('crearCliente');


//Reserva
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





