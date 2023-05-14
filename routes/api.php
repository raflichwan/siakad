<?php

use App\Http\Controllers\Admin\SantriController;
use App\Http\Controllers\Api\AbsenController;
use App\Http\Controllers\Api\ArtikelController;
use App\Http\Controllers\Api\KelasController;
use App\Http\Controllers\Api\MataPelajaranMasterController;
use App\Http\Controllers\Api\PelanggaranController;
use App\Http\Controllers\Api\PelanggaranMasterController;
use App\Http\Controllers\Api\PenjengukanController;
use App\Http\Controllers\Api\PerizinanController;
use App\Http\Controllers\Api\SantriPengajarController;
use App\Http\Controllers\Api\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//show data from api
// Route::resource('santriapi', SantriController::class); //http://127.0.0.1:8000/api/santriapi
Route::resource('absen', AbsenController::class); //http://127.0.0.1:8000/api/santripengajar
Route::resource('artikel', ArtikelController::class); //http://127.0.0.1:8000/api/santripengajar
Route::resource('kelas', KelasController::class); //http://127.0.0.1:8000/api/santripengajar
Route::resource('matapelajaranmaster', MataPelajaranMasterController::class); //http://127.0.0.1:8000/api/santripengajar
Route::resource('pelanggaran', PelanggaranController::class); //http://127.0.0.1:8000/api/Pelanggaran
Route::resource('pelanggaranmaster', PelanggaranMasterController::class); //http://127.0.0.1:8000/api/santripengajar
Route::resource('penjengukan', PenjengukanController::class); //http://127.0.0.1:8000/api/santripengajar
Route::resource('perizinan', PerizinanController::class); //http://127.0.0.1:8000/api/santripengajar
Route::resource('santripengajar', SantriPengajarController::class); //http://127.0.0.1:8000/api/santripengajar
Route::resource('web', WebController::class); //http://127.0.0.1:8000/api/santripengajar
