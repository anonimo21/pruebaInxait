<?php

use App\Http\Controllers\CiudadesController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('clientes', ClienteController::class);


Route::get('departamentos', [DepartamentosController::class, 'index']);
Route::get('ciudades/{departamento}', [CiudadesController::class, 'index']);