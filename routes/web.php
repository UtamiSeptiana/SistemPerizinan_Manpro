<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\hrdController;
use App\Http\Controllers\KepalaRuangController;
use App\Http\Controllers\ManajerController;
use App\Http\Controllers\DirekturController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/* GRUP MIDDLEWARE ADMIN */
Route::middleware(['auth','role:admin'])->group(function(){
    //Memanggil halaman dashboard admin
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/daftarpegawai', [AdminController::class, 'DaftarPegawaAdmin'])->name('admin.daftarpegawai');
    //Memanggl halaman cuti admin
    Route::get('/admin/cutiadmin', [AdminController::class, 'CutiAdmin'])->name('admin.cutiadmin');
    //memanggil halaman logout
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    //memanggil halaman profile
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    //memanggil proses update profile
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
});

/* GRUP MIDDLEWARE PEGAWAI */
Route::middleware(['auth', 'verified', 'role:pegawai'])->group(function(){
    //Memanggil halaman dashboard admin
    Route::get('/pegawai/dashboard', [PegawaiController::class, 'PegawaiDashboard'])->name('pegawai.dashboard');
    //memanggil halaman syarat cuti
    Route::get('/pegawai/syaratcutipegawai', [PegawaiController::class, 'SyaratCutiPegawai'])->name('pegawai.syaratcutipegawai');
    //memanggil halaman pengajuan cuti
    Route::get('/pegawai/pengajuancutipegawai', [PegawaiController::class, 'PengajuanCutiPegawai'])->name('pegawai.pengajuancutipegawai');
    //memanggil proses simpan pengajuan cuti
    Route::post('/pegawai/pengajuancutipegawaistore', [PegawaiController::class, 'Store'])->name('pegawai.pengajuancutipegawaistore');
    //memanggil halaman approval pegawai
    Route::get('/pegawai/approvalpegawai', [PegawaiController::class, 'ApprovalPegawai'])->name('pegawai.approvalpegawai');
    //memanggil halaman logout
    Route::get('/pegawai/logout', [PegawaiController::class, 'PegawaiLogout'])->name('pegawai.logout');
    //memanggil fungsi hapus data
    Route::delete('/pegawai/destroy{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
    //memanggil halaman edit
    Route::get('/pegawai/pengajuancutipegawai/edit{id}', [PegawaiController::class, 'edit'])->name('pegawai.pengajuancutipegawaiedit');
    //menyimpan update data
    Route::patch('/pegawai/edit{id}', [PegawaiController::class, 'update'])->name('pegawai.editproses');
    //memanggil halaman profile
    Route::get('/pegawai/profile', [PegawaiController::class, 'PegawaiProfile'])->name('pegawai.profile');
    //memanggil proses update profile
    Route::post('/pegawai/profile/store', [PegawaiController::class, 'PegawaiProfileStore'])->name('pegawai.profile.store');
});


/* GRUP MIDDLEWARE KEPALA RUANG */
Route::middleware(['auth', 'verified', 'role:kepala ruang'])->group(function(){
    Route::get('/kepalaruang/dashboard', [KepalaRuangController::class, 'KepalaRuangDashboard'])->name('kepalaruang.dashboard');
    //memanggil halaman profile
    Route::get('/kepalaruang/profile', [KepalaRuangController::class, 'KepalaRuangProfile'])->name('kepalaruang.profile');
    //memanggil proses update profile
    Route::post('/kepalaruang/profile/store', [KepalaRuangController::class, 'KepalaRuangProfileStore'])->name('kepalaruang.profile.store');
    //memanggil halaman logout
    Route::get('/kepalaruang/logout', [KepalaRuangController::class, 'KepalaRuangLogout'])->name('kepalaruang.logout');
    //memanggil halaman syarat cuti
    Route::get('/kepalaruang/syaratcutikepalaruang', [KepalaRuangController::class, 'SyaratCutiKepalaRuang'])->name('kepalaruang.syaratcutikepalaruang');
    //memanggil halaman pengajuan cuti
    Route::get('/kepalaruang/pengajuancutikepalaruang', [KepalaRuangController::class, 'PengajuanCutiKepalaRuang'])->name('kepalaruang.pengajuancutikepalaruang');
    //memanggil proses simpan pengajuan cuti
    Route::post('/kepalaruang/pengajuancutikepalaruangstore', [KepalaRuangController::class, 'Store'])->name('kepalaruang.pengajuancutikepalaruangstore');
    //memanggil halaman approval kepalaruang
    Route::get('/kepalaruang/approvalkepalaruang', [KepalaRuangController::class, 'ApprovalKepalaRuang'])->name('kepalaruang.approvalkepalaruang');
    //memanggil halaman permintaan persetujuan kepalaruang
    Route::get('/kepalaruang/persetujuankepalaruang', [KepalaRuangController::class, 'PersetujuanKepalaRuang'])->name('kepalaruang.persetujuankepalaruang');
    //memanggil fungsi hapus data
    Route::delete('/kepalaruang/destroy{id}', [KepalaRuangController::class, 'destroy'])->name('kepalaruang.destroy');
    //memanggil halaman edit
    Route::get('/kepalaruang/pengajuancutikepalaruang/edit{id}', [KepalaRuangController::class, 'edit'])->name('kepalaruang.pengajuancutikepalaruangedit');
    //menyimpan update data
    Route::patch('/kepalaruang/edit{id}', [KepalaRuangController::class, 'update'])->name('kepalaruang.editproses');
    //memanggil halaman lihat editacckepalaruang
    Route::get('/kepalaruang/detailacckepalaruang/edit{id}', [KepalaRuangController::class, 'AccKepalaRuang'])->name('kepalaruang.acckepalaruang');
    //menyimpan update dataacckepalaruang
    Route::patch('/kepalaruang/acckepalaruangedit{id}', [KepalaRuangController::class, 'AccKepalaRuangupdate'])->name('kepalaruang.acckepalaruangeditproses');
});


/* GRUP MIDDLEWARE hrd */
Route::middleware(['auth', 'verified','role:hrd'])->group(function(){
    Route::get('/hrd/dashboard', [hrdController::class, 'hrdDashboard'])->name('hrd.dashboard');
    //memanggil halaman profile
    Route::get('/hrd/profile', [hrdController::class, 'hrdProfile'])->name('hrd.profile');
    //memanggil proses update profile
    Route::post('/hrd/profile/store', [hrdController::class, 'hrdProfileStore'])->name('hrd.profile.store');
    //memanggil halaman logout
    Route::get('/hrd/logout', [hrdController::class, 'hrdLogout'])->name('hrd.logout');
    //memanggil halaman syarat cuti
    Route::get('/hrd/syaratcutihrd', [hrdController::class, 'SyaratCutihrd'])->name('hrd.syaratcutihrd');
    //memanggil halaman pengajuan cuti
    Route::get('/hrd/pengajuancutihrd', [hrdController::class, 'PengajuanCutihrd'])->name('hrd.pengajuancutihrd');
    //memanggil proses simpan pengajuan cuti
    Route::post('/hrd/pengajuancutihrdstore', [hrdController::class, 'Store'])->name('hrd.pengajuancutihrdstore');
    //memanggil halaman approval kepalaruang
    Route::get('/hrd/approvalhrd', [hrdController::class, 'Approvalhrd'])->name('hrd.approvalhrd');
    //memanggil halaman permintaan persetujuan kepalaruang
    Route::get('/hrd/persetujuanhrd', [hrdController::class, 'Persetujuanhrd'])->name('hrd.persetujuanhrd');
    //memanggil fungsi hapus data
    Route::delete('/hrd/destroy{id}', [hrdController::class, 'destroy'])->name('hrd.destroy');
    //memanggil halaman edit
    Route::get('/hrd/pengajuancutihrd/edit{id}', [hrdController::class, 'edit'])->name('hrd.pengajuancutihrdedit');
    //menyimpan update data
    Route::patch('/hrd/edit{id}', [hrdController::class, 'update'])->name('hrd.editproses');
//memanggil halaman lihat editacchrd
Route::get('/hrd/detailacchrd/edit{id}', [hrdController::class, 'Acchrd'])->name('hrd.acchrd');
//menyimpan update dataacchrd
Route::patch('/hrd/acchrdedit{id}', [hrdController::class, 'Acchrdupdate'])->name('hrd.hrdeditproses');
});

/* GRUP MIDDLEWARE DIREKTUR */
Route::middleware(['auth', 'verified', 'role:direktur'])->group(function(){
    Route::get('/direktur/dashboard', [DirekturController::class, 'DirekturDashboard'])->name('direktur.dashboard');
    //memanggil halaman profile
    Route::get('/direktur/profile', [DirekturController::class, 'DirekturProfile'])->name('direktur.profile');
    //memanggil proses update profile
    Route::post('/direktur/profile/store', [DirekturController::class, 'DirekturProfileStore'])->name('direktur.profile.store');
    //memanggil halaman logout
    Route::get('/direktur/logout', [DirekturController::class, 'DirekturLogout'])->name('direktur.logout');
    //memanggil halaman syarat cuti
    Route::get('/direktur/syaratcutidirektur', [DirekturController::class, 'SyaratCutiDirektur'])->name('direktur.syaratcutidirektur');
    //memanggil halaman pengajuan cuti
    Route::get('/direktur/pengajuancutidirektur', [DirekturController::class, 'PengajuanCutiDirektur'])->name('direktur.pengajuancutidirektur');
    //memanggil proses simpan pengajuan cuti
    Route::post('/direktur/pengajuancutidirekturstore', [DirekturController::class, 'Store'])->name('direktur.pengajuancutidirekturstore');
    //memanggil halaman approval kepalaruang
    Route::get('/direktur/approvaldirektur', [DirekturController::class, 'ApprovalDirektur'])->name('direktur.approvaldirektur');
    //memanggil halaman permintaan persetujuan kepalaruang
    Route::get('/direktur/persetujuandirektur', [DirekturController::class, 'PersetujuanDirektur'])->name('direktur.persetujuandirektur');
    //memanggil fungsi hapus data
    Route::delete('/direktur/destroy{id}', [DirekturController::class, 'destroy'])->name('direktur.destroy');
    //memanggil halaman edit
    Route::get('/direktur/pengajuancutidirektur/edit{id}', [DirekturController::class, 'edit'])->name('direktur.pengajuancutidirekturedit');
    //menyimpan update data
    Route::patch('/direktur/edit{id}', [DirekturController::class, 'update'])->name('direktur.editproses');
    //memanggil halaman lihat editaccdrektur
Route::get('/direktur/detailaccdirektur/edit{id}', [DirekturController::class, 'Accdirektur'])->name('direktur.accdirektur');
//menyimpan update dataacchrd
Route::patch('/direktur/accdirekturedit{id}', [DirekturController::class, 'Accdirekturupdate'])->name('direktur.direktureditproses');

});

/* GRUP MIDDLEWARE MANAJER */
Route::middleware(['auth', 'verified', 'role:manajer'])->group(function(){
    Route::get('/manajer/dashboard', [ManajerController::class, 'ManajerDashboard'])->name('manajer.dashboard');
    //memanggil halaman profile
    Route::get('/manajer/profile', [ManajerController::class, 'ManajerProfile'])->name('manajer.profile');
    //memanggil proses update profile
    Route::post('/manajer/profile/store', [ManajerController::class, 'ManajerProfileStore'])->name('manajer.profile.store');
    //memanggil halaman logout
    Route::get('/manajer/logout', [ManajerController::class, 'ManajerLogout'])->name('manajer.logout');
    //memanggil halaman syarat cuti
    Route::get('/manajer/syaratcutimanajer', [ManajerController::class, 'SyaratCutiManajer'])->name('manajer.syaratcutimanajer');
    //memanggil halaman pengajuan cuti
    Route::get('/manajer/pengajuancutimanajer', [ManajerController::class, 'PengajuanCutiManajer'])->name('manajer.pengajuancutimanajer');
    //memanggil proses simpan pengajuan cuti
    Route::post('/manajer/pengajuancutimanajerstore', [ManajerController::class, 'Store'])->name('manajer.pengajuancutimanajerstore');
    //memanggil halaman approval kepalaruang
    Route::get('/manajer/approvalmanajer', [ManajerController::class, 'ApprovalManajer'])->name('manajer.approvalmanajer');
    //memanggil halaman permintaan persetujuan kepalaruang
    Route::get('/manajer/persetujuanmanajer', [ManajerController::class, 'PersetujuanManajer'])->name('manajer.persetujuanmanajer');
    //memanggil fungsi hapus data
    Route::delete('/manajer/destroy{id}', [ManajerController::class, 'destroy'])->name('manajer.destroy');
    //memanggil halaman edit
    Route::get('/manajer/pengajuancutimanajer/edit{id}', [ManajerController::class, 'edit'])->name('manajer.pengajuancutimanajeredit');
    //menyimpan update data
    Route::patch('/manajer/edit{id}', [ManajerController::class, 'update'])->name('manajer.editproses');
//memanggil halaman lihat editaccmanajer
Route::get('/manajer/detailaccmanajer/edit{id}', [ManajerController::class, 'Accmanajer'])->name('manajer.accmanajer');
//menyimpan update dataacchrd
Route::patch('/manajer/accmanajeredit{id}', [ManajerController::class, 'Accmanajerupdate'])->name('manajer.manajereditproses');
});














