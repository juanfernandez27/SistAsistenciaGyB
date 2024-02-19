<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsistenciaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () { return view('index'); })->middleware('auth');;

Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('index')->middleware('auth');
Route::get('/asistencias/reportes', [AsistenciaController::class, 'reportes'])->name('reportes')->middleware('auth');
Route::get('/asistencias/pdf', [AsistenciaController::class, 'pdf'])->name('pdf')->middleware('auth');
Route::get('/asistencias/pdf_fechas', [AsistenciaController::class, 'pdf_fechas'])->name('pdf_fechas')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Auth::routes(['register'=>false]);

Route::resource('/trabajadores',\App\Http\Controllers\TrabajadorController::class)->middleware('auth');
Route::resource('/areas',\App\Http\Controllers\AreaController::class)->middleware('auth');
Route::resource('/usuarios',\App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('/asistencias',\App\Http\Controllers\AsistenciaController::class)->middleware('auth');





//Route::get('/trabajadores', [App\Http\Controllers\TrabajadorController::class, 'index']);
//Route::get('/trabajadores/create', [App\Http\Controllers\TrabajadorController::class, 'create']);

//Route::get('/trabajadores', function () { return view('trabajadores.index'); })->middleware('auth');;


