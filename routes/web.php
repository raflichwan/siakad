<?php

use App\Http\Controllers\Admin\AbsensiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Admin\WebController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\JadwalPelajaranController;
use App\Http\Controllers\Admin\KelasMasterController;
use App\Http\Controllers\Admin\MataPelajaranMasterController;
use App\Http\Controllers\Admin\NilaiController;
use App\Http\Controllers\Admin\PelanggaranController;
use App\Http\Controllers\Admin\PelanggaranMasterController;
use App\Http\Controllers\Admin\PengajarController;
use App\Http\Controllers\Admin\SantriController;
use App\Http\Controllers\Admin\SantripengajarMasterController;
use App\Http\Controllers\PenjengukanController;
use App\Models\PelanggaranMaster;

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

Route::get('coba', function () {
    return view('coba');
});

Route::get("/", [GuestController::class, 'show']);

Route::middleware(['auth'])->group(function () {
    //kalau disini harus login dahulu
    Route::get("dashboard", [AdminController::class, 'show']);

    // Artikel
    Route::get("artikeladmin", [ArtikelController::class, 'show']); // Show tampilan
    Route::post("artikeladmin", [ArtikelController::class, 'createedit']); //Create Edit Insert Artikel
    Route::get("artikeladmindelete/{id?}", [ArtikelController::class, 'destory']); // Show tampilan

    //Web
    Route::get("web", [WebController::class, 'show']); // Show tampilan
    Route::post("web", [WebController::class, 'createedit']); //Create Edit Insert Artikel

    //Santri
    Route::get("santri", [SantriController::class, 'show']); // Show tampilan
    Route::post("santri", [SantriController::class, 'createedit']); //Create Edit Insert Artikel
    Route::get("santridelete/{id?}", [SantriController::class, 'destory']); // Show tampilan

    //Pengajar
    Route::get("pengajar", [PengajarController::class, 'show']); // Show tampilan
    Route::post("pengajar", [PengajarController::class, 'createedit']); //Create Edit Insert Artikel
    Route::get("pengajardelete/{id?}", [PengajarController::class, 'destory']); // Show tampilan

    //Santri Pengajar Master
    Route::get("santripengajar", [SantripengajarMasterController::class, 'show']); // Show tampilan
    Route::post("santripengajar", [SantripengajarMasterController::class, 'createedit']); //Create Edit Insert Artikel
    Route::get("santripengajardelete/{id?}", [SantripengajarMasterController::class, 'destory']); // Show tampilan
    Route::get("viewsantripengajar/{id?}", [SantripengajarMasterController::class, 'viewsantripengajar']); // Show tampilan

    //Nilai
    Route::get("datasantri/{id?}", [NilaiController::class, 'datasantri']); // Show tampilan
    Route::get("export/{id?}", [NilaiController::class, 'export']); // Show tampilan
    Route::post("uploadnilai", [NilaiController::class, 'import']); // Show tampilan

    //Pelanggaran Master
    Route::get("pelanggaranmaster", [PelanggaranMasterController::class, 'show']); // Show tampilan
    Route::post("pelanggaranmaster", [PelanggaranMasterController::class, 'createedit']); //Create Edit Insert Artikel
    Route::get("pelanggaranmasterdelete/{id?}", [PelanggaranMasterController::class, 'destory']); // Show tampilan

    //Input Pelanggaran
    Route::get("pelanggaran", [PelanggaranController::class, 'show']); // Show tampilan
    Route::post("pelanggaran", [PelanggaranController::class, 'createedit']); //Create Edit Insert Artikel
    Route::get("pelanggarandelete/{id?}", [PelanggaranController::class, 'destory']); // Show tampilan
    //Pilihan opsi dropdown santri/pengajar
    Route::get("viewpelanggaran/{id?}", [PelanggaranController::class, 'viewpelanggaran']); // Show tampilan
    //Laporan Pelanggaran
    Route::get("laporanpelanggaran", [PelanggaranController::class, 'laporan']); // Show tampilan

    //Mata Pelajaran Master
    Route::get("mapelmaster", [MataPelajaranMasterController::class, 'show']); // Show tampilan
    Route::post("mapelmaster", [MataPelajaranMasterController::class, 'createedit']); //Create Edit Insert Artikel
    Route::get("mapelmasterdelete/{id?}", [MataPelajaranMasterController::class, 'destory']); // Show tampilan

    //Kelas Master
    Route::get("kelasmaster", [KelasMasterController::class, 'show']); // Show tampilan
    Route::post("kelasmaster", [KelasMasterController::class, 'createedit']); //Create Edit Insert Artikel
    Route::get("kelasmasterdelete/{id?}", [KelasMasterController::class, 'destory']); // Show tampilan

    //Jadwal Pelajaran
    Route::get("jadwalpelajaran", [JadwalPelajaranController::class, 'show']); // Show tampilan
    Route::post("jadwalpelajaran", [JadwalPelajaranController::class, 'createedit']); //Create Edit Insert Artikel
    Route::get("jadwalpelajarandelete/{id?}", [JadwalPelajaranController::class, 'destory']); // Show tampilan
    //Laporan Jadwal Pelajaran
    Route::get("laporanjadwal/{id?}", [JadwalPelajaranController::class, 'laporan']); // Show tampilan


    //Absesnsi
    Route::get("absensi", [AbsensiController::class, 'show']); // Show tampilan
    Route::post("absensi", [AbsensiController::class, 'createedit']); //Create Edit Insert Artikel
    Route::get("absensidelete/{id?}", [SantripeAbsensiControllerngajarMasterController::class, 'destory']); // Show tampilan
    //Laporan Absensi
    Route::get("laporanabsensi/{id?}", [AbsensiController::class, 'laporan']); // Show tampilan


});

//Artikel
Route::get("artikel", [GuestController::class, 'artikel']);
Route::get("artikeldetail/{id?}", [GuestController::class, 'artikeldetail']);

//Pengajuan Penjengukan
Route::post("inputpenjengukan", [PenjengukanController::class, 'createedit']);
Route::get('users/export/', [GuestController::class, 'export']);

require __DIR__ . '/auth.php';
