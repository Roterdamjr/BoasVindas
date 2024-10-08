<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CadastroController;
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
    return view('welcome');
});

Route::get('/register', [ AuthController::class , 'register' ]);
Route::post('/register', [ AuthController::class , 'registerPost' ]) ;

Route::get('/login', [ AuthController::class , 'login' ])->name('login');
Route::post('/login', [ AuthController::class , 'loginPost' ]) ;

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/cadastro', [ CadastroController::class , 'edit' ]);
Route::get('/show', [ CadastroController::class , 'show' ]) ;



Route::middleware(['auth'])->group(function () {
    Route::get('/cadastro', [CadastroController::class, 'edit']);
    Route::get('/show', [CadastroController::class, 'show']);
});