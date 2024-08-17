<?php


use App\Http\Controllers\InitController;

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
    return view('home');})->name('home');

Route::get('/init/login', [InitController::class, 'login'])->name('login');
Route::get('/init/registro', [InitController::class, 'registro'])->name('registro');
Route::post('/api/crear-cliente', [InitController::class, 'crearCliente'])->name('crearCliente');


//Route::get('/Login', function () {return view('login');})->name('login');

Route::get('/perfil', function () {
    return view('perfil');})->name('perfil');

Route::get('/reservas', function () {
    return view('reservas');})->name('reservas');

Route::get('/busqueda', function () {
    return view('busqueda');})->name('busqueda');



