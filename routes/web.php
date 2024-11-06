<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\KomponenController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\PemeliharaanController;
use App\Http\Controllers\JenisPeralatanController;
use App\Http\Controllers\PeralatanTelemetriController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('pemeriksaans', PemeriksaanController::class);
        Route::resource('pemeliharaans', PemeliharaanController::class);
        Route::resource('jenis-peralatans', JenisPeralatanController::class);
        Route::resource('peralatan-telemetris', PeralatanTelemetriController::class);
        Route::resource('komponens', KomponenController::class);
        Route::resource('settings', SettingController::class);
        Route::resource('pemeliharaans', PemeliharaanController::class);
    });
