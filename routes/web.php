<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PmaController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\WifiController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\RouterController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\AplikasiController;
use App\Http\Controllers\KomputerController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', function () {
//     return view('welcome');
// });

Route::prefix('/')
->middleware('auth')
->group(function () {
        Route::get('/', function () {
            return view('welcome');
        });

        Route::controller(AplikasiController::class)->group(function () {
            Route::get('/aplikasi', 'index');
            Route::post('/aplikasi/simpan', 'simpan');
            Route::get('/aplikasi/hapus/{id}', 'hapus');
            Route::put('/aplikasi/update/{id}', 'update')->name('update_aplikasi');
        });
        Route::controller(EmailController::class)->group(function () {
            Route::get('/email', 'index');
            Route::post('/email/simpan', 'simpan');
            Route::get('/email/hapus/{id}', 'hapus');
            Route::put('/email/update/{id}', 'update');
        });
        Route::controller(TaskController::class)->group(function () {
            Route::get('/task', 'index')->name('task_index');
            Route::post('/task/simpan', 'simpan');
            Route::get('/task/hapus/{id}', 'hapus');
            Route::put('/task/update/{id}', 'update');
        });
        Route::controller(KomputerController::class)->group(function () {
            Route::get('/komputer', 'index')->name('komputer_index');
            Route::post('/komputer/simpan', 'simpan');
            Route::get('/komputer/hapus/{id}', 'hapus');
            Route::put('/komputer/update/{id}', 'update');
        });
        Route::controller(WifiController::class)->group(function () {
            Route::get('/wifi', 'index')->name('wifi_index');
            Route::post('/wifi/simpan', 'simpan');
            Route::get('/wifi/hapus/{id}', 'hapus');
            Route::put('/wifi/update/{id}', 'update');
        });
        Route::controller(RouterController::class)->group(function () {
            Route::get('/router', 'index')->name('router_index');
            Route::post('/router/simpan', 'simpan');
            Route::get('/router/hapus/{id}', 'hapus');
            Route::put('/router/update/{id}', 'update');
        });
        Route::controller(ServerController::class)->group(function () {
            Route::get('/server', 'index')->name('server_index');
            Route::post('/server/simpan', 'simpan');
            Route::get('/server/hapus/{id}', 'hapus');
            Route::put('/server/update/{id}', 'update');
        });
        Route::controller(PmaController::class)->group(function () {
            Route::get('/pma', 'index')->name('pma_index');
            Route::post('/pma/simpan', 'simpan');
            Route::get('/pma/hapus/{id}', 'hapus');
            Route::put('/pma/update/{id}', 'update');
        });
        Route::controller(AreaController::class)->group(function () {
            Route::get('/area', 'index')->name('area_index');
            Route::post('/area/simpan_area', 'simpan_area');
            Route::get('/area/hapus_area/{id}', 'hapus_area');
            Route::put('/area/update_area/{id}', 'update_area');
        });
        Route::controller(UnitController::class)->group(function () {
            Route::get('/unit', 'index')->name('unit_index');
            Route::post('/unit/simpan_unit', 'simpan_unit');
            Route::get('/unit/hapus_unit/{id}', 'hapus_unit');
            Route::put('/unit/update_unit/{id}', 'update_unit');
        });
    });
