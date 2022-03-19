<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('pages/dashboard');
// });

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('register', [LoginController::class, 'register']);
Route::post('register-user', [LoginController::class, 'create']);

Route::group(['middleware' => ['admin']], function() {
    Route::get('/', [DashboardController::class,'index']);
    Route::get('dashboard',[DashboardController::class,'index']);
});