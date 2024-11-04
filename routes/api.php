<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\KomponenController;
use App\Http\Controllers\Api\PemeriksaanController;
use App\Http\Controllers\Api\PemeliharaanController;
use App\Http\Controllers\Api\JenisPeralatanController;
use App\Http\Controllers\Api\UserPemeriksaansController;
use App\Http\Controllers\Api\UserPemeliharaansController;
use App\Http\Controllers\Api\PeralatanTelemetriController;
use App\Http\Controllers\Api\SettingPemeriksaansController;
use App\Http\Controllers\Api\KomponenPemeriksaansController;
use App\Http\Controllers\Api\PemeliharaanPemeriksaansController;
use App\Http\Controllers\Api\PeralatanTelemetriSettingsController;
use App\Http\Controllers\Api\PeralatanTelemetriKomponensController;
use App\Http\Controllers\Api\PeralatanTelemetriPemeliharaansController;
use App\Http\Controllers\Api\JenisPeralatanPeralatanTelemetrisController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('users', UserController::class);

        // User Pemeliharaans
        Route::get('/users/{user}/pemeliharaans', [
            UserPemeliharaansController::class,
            'index',
        ])->name('users.pemeliharaans.index');
        Route::post('/users/{user}/pemeliharaans', [
            UserPemeliharaansController::class,
            'store',
        ])->name('users.pemeliharaans.store');

        // User Pemeriksaans
        Route::get('/users/{user}/pemeriksaans', [
            UserPemeriksaansController::class,
            'index',
        ])->name('users.pemeriksaans.index');
        Route::post('/users/{user}/pemeriksaans', [
            UserPemeriksaansController::class,
            'store',
        ])->name('users.pemeriksaans.store');

        Route::apiResource('pemeriksaans', PemeriksaanController::class);

        Route::apiResource('pemeliharaans', PemeliharaanController::class);

        // Pemeliharaan Pemeriksaans
        Route::get('/pemeliharaans/{pemeliharaan}/pemeriksaans', [
            PemeliharaanPemeriksaansController::class,
            'index',
        ])->name('pemeliharaans.pemeriksaans.index');
        Route::post('/pemeliharaans/{pemeliharaan}/pemeriksaans', [
            PemeliharaanPemeriksaansController::class,
            'store',
        ])->name('pemeliharaans.pemeriksaans.store');

        Route::apiResource('jenis-peralatans', JenisPeralatanController::class);

        // JenisPeralatan Peralatan Telemetris
        Route::get('/jenis-peralatans/{jenisPeralatan}/peralatan-telemetris', [
            JenisPeralatanPeralatanTelemetrisController::class,
            'index',
        ])->name('jenis-peralatans.peralatan-telemetris.index');
        Route::post('/jenis-peralatans/{jenisPeralatan}/peralatan-telemetris', [
            JenisPeralatanPeralatanTelemetrisController::class,
            'store',
        ])->name('jenis-peralatans.peralatan-telemetris.store');

        Route::apiResource(
            'peralatan-telemetris',
            PeralatanTelemetriController::class
        );

        // PeralatanTelemetri Komponens
        Route::get('/peralatan-telemetris/{peralatanTelemetri}/komponens', [
            PeralatanTelemetriKomponensController::class,
            'index',
        ])->name('peralatan-telemetris.komponens.index');
        Route::post('/peralatan-telemetris/{peralatanTelemetri}/komponens', [
            PeralatanTelemetriKomponensController::class,
            'store',
        ])->name('peralatan-telemetris.komponens.store');

        // PeralatanTelemetri Pemeliharaans
        Route::get('/peralatan-telemetris/{peralatanTelemetri}/pemeliharaans', [
            PeralatanTelemetriPemeliharaansController::class,
            'index',
        ])->name('peralatan-telemetris.pemeliharaans.index');
        Route::post(
            '/peralatan-telemetris/{peralatanTelemetri}/pemeliharaans',
            [PeralatanTelemetriPemeliharaansController::class, 'store']
        )->name('peralatan-telemetris.pemeliharaans.store');

        // PeralatanTelemetri Settings
        Route::get('/peralatan-telemetris/{peralatanTelemetri}/settings', [
            PeralatanTelemetriSettingsController::class,
            'index',
        ])->name('peralatan-telemetris.settings.index');
        Route::post('/peralatan-telemetris/{peralatanTelemetri}/settings', [
            PeralatanTelemetriSettingsController::class,
            'store',
        ])->name('peralatan-telemetris.settings.store');

        Route::apiResource('komponens', KomponenController::class);

        // Komponen Pemeriksaans
        Route::get('/komponens/{komponen}/pemeriksaans', [
            KomponenPemeriksaansController::class,
            'index',
        ])->name('komponens.pemeriksaans.index');
        Route::post('/komponens/{komponen}/pemeriksaans', [
            KomponenPemeriksaansController::class,
            'store',
        ])->name('komponens.pemeriksaans.store');

        Route::apiResource('settings', SettingController::class);

        // Setting Pemeriksaans
        Route::get('/settings/{setting}/pemeriksaans', [
            SettingPemeriksaansController::class,
            'index',
        ])->name('settings.pemeriksaans.index');
        Route::post('/settings/{setting}/pemeriksaans', [
            SettingPemeriksaansController::class,
            'store',
        ])->name('settings.pemeriksaans.store');

        Route::apiResource('pemeliharaans', PemeliharaanController::class);

        // Pemeliharaan Pemeriksaans
        Route::get('/pemeliharaans/{pemeliharaan}/pemeriksaans', [
            PemeliharaanPemeriksaansController::class,
            'index',
        ])->name('pemeliharaans.pemeriksaans.index');
        Route::post('/pemeliharaans/{pemeliharaan}/pemeriksaans', [
            PemeliharaanPemeriksaansController::class,
            'store',
        ])->name('pemeliharaans.pemeriksaans.store');
    });
