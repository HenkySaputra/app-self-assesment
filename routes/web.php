<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\super\SuperController;
use App\Http\Controllers\umum\UmumController;
use App\Http\Controllers\employee\employeeController;
use App\Http\Controllers\hrd\hrdController;
use App\Http\Controllers\hrd\HrdController as HrdHrdController;

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

//Manajemen Umum
Route::get('/', [UmumController::class, 'beranda']);
Route::get('/login', [UmumController::class, 'login'])->name('login');
Route::post('/proses_login', [UmumController::class, 'proses_login']);


//Manajemen employee
//Beranda
Route::get('/employee/index', [EmployeeController::class, 'index'])->name('employee_dashboard');
Route::get('/employee/profil', [EmployeeController::class, 'profil'])->name('profil');
Route::post('/employee/update-profile',[employeeController:: class, 'updateProfile'])->name('profile.update');
Route::post('/employee/change-password',[employeeController:: class, 'changePassword'])->name('profile.update.password');

//Lihat history
Route::get('/employee/self-penilaian', [EmployeeController::class, 'self_penilaian'])->name('self_penilaian');
Route::get('/employee/history', [EmployeeController::class, 'history'])->name('history');
//lihat assessment
Route::get('/employee/penilaian/{userId}',[employeeController:: class, 'penilaian'])->name('penilaian');
Route::post('/employee/penilaian/{userId}',[employeeController:: class, 'simpanPenilaian'])->name('simpanPenilaian');

Route::get('/employee/update-penilaian/{userId}',[employeeController:: class, 'getCurrentAssessment'])->name('penilaian.update');
Route::post('/employee/update-penilaian/{userId}',[employeeController:: class, 'updateAssessment'])->name('penilaian.update.simpan');

//Manajemen hrd
//Beranda
Route::get('/hrd/index', [HrdController::class, 'index'])->name('hrd_dashboard');
//Lihat Data
Route::get('/hrd/lihat_kriteria', [HrdController::class, 'lihat_kriteria'])->name('lihat_data_kriteria');
Route::get('/hrd/assessments/report', [HrdController::class, 'createReport'])->name('penilaian.report');
Route::get('hrd/lihat_jumlah_employee', [HrdController::class, 'lihat_jumlah_employee'])->name('lihat_jumlah_employee');

//Lihat Profil
//Lihat Data Arsip Pribadi
Route::get('/hrd/tambah_kriteria', [HrdController::class, 'tambah_kriteria'])->name('tambah_data_kriteria');
Route::post('/hrd/proses-tambah-kritaria', [HrdController::class, 'proses_tambah_kriteria'])->name('proses_tambah_kriteria');
Route::post('/hrd/send-email',[HrdController:: class, 'sendEmail'])->name('send.email');
//Hapus hrd
Route::get('/hrd/hapus-kriteria', [HrdController::class, 'hapus_kriteria'])->name('hapus_kriteria');
Route::get('/hrd/edit_kriteria', [HrdController::class, 'edit_kriteria'])->name('edit_data_kriteria');
Route::get('/hrd/lihat_laporan_penilaian', [HrdController::class, 'lihat_laporan_penilaian'])->name('lihat_laporan_penialain');
Route::get('/hrd/lihat_nama_laporan', [HrdController::class, 'lihat_nama_laporan'])->name('lihat_nama_laporan');
Route::get('hrd/lihat_jumlah_kriteria', [HrdHrdController::class, 'lihat_jumlah_kriteria'])->name('lihat_jumlah_kriteria');
Route::get('hrd/lihat_sudah_mengisi', [HrdHrdController::class, 'lihat_sudah_mengisi'])->name('lihat_sudah_mengisi');
Route::get('hrd/lihat_masih_mengisi', [HrdHrdController::class, 'lihat_masih_mengisi'])->name('lihat_masih_mengisi');
Route::get('hrd/lihat_belum_mengisi', [HrdHrdController::class, 'lihat_belum_mengisi'])->name('lihat_belum_mengisi');
Route::get('/hrd/lihat_logs', [hrdController::class, 'lihat_logs'])->name('lihat_logs');

//Manajemen Super
//Beranda
Route::get('/super/index', [SuperController::class, 'index'])->name('admin_dashboard');
//Lihat Profil
//Create Data employee
//Lihat Data
Route::get('/super/lihat-user', [SuperController::class, 'lihat_user'])->name('lihat_user');
//Tambah User
Route::get('/super/tambah-user', [SuperController::class, 'tambah_user'])->name('tambah_user');
Route::post('/super/proses-tambah-user', [SuperController::class, 'proses_tambah_user'])->name('proses_tambah_user');
//Hapus User
Route::get('/super/hapus-user/{userid}', [SuperController::class, 'hapus_user'])->name('hapus_user');
//Edit User
Route::get('/super/update-user/{userId}',[SuperController:: class, 'getCurrentuser'])->name('user.update');
Route::post('/super/update-user/{userId}',[SuperController:: class, 'update_user'])->name('user.update.simpan');
Route::get('/super/hapus-user/{userId}', [SuperController::class, 'hapus_user'])->name('simpan.hapus.user');
Route::get('/super/edit-user', [SuperController::class, 'edit_user'])->name('edit_data_user');
Route::post('/super/update-user', [SuperController::class, 'update_user'])->name('update_user');

Route::get('/super/lihat-kriteria', [SuperController::class, 'lihat_kriteria'])->name('lihat_kriteria');
//Tambah hrd
Route::get('/super/tambah-kriteria', [SuperController::class, 'tambah_kriteria'])->name('tambah_kriteria');
Route::post('/super/proses-tambah-kriteria', [SuperController::class, 'proses_tambah_kriteria'])->name('proses_tambah_kriteria');
//Hapus hrd
Route::get('/super/hapus-kriteria', [SuperController::class, 'hapus_kriteria'])->name('hapus_kriteria');
//Edit hrd
Route::get('/super/update-kriteria/{criteriaId}',[SuperController:: class, 'getCurrentkriteria'])->name('kriteria.update');
Route::post('/super/update-kriteria/{criteriaId}',[SuperController:: class, 'update_kriteria'])->name('kriteria.update.simpan');
Route::get('/super/hapus-kriteria/{criteriaId}', [SuperController::class, 'hapus_kriteria'])->name('simpan.hapus.kriteria');
Route::get('/super/edit-data-kriteria', [SuperController::class, 'edit_data_kriteria'])->name('edit_data_kriteria');
Route::post('/super/update-kriteria', [SuperController::class, 'update_kriteria'])->name('update_kriteria');
Route::get('/super/lihat_logs', [SuperController::class, 'lihat_logs'])->name('lihat_logs');
Route::get('/super/lihat_jumlah_employee', [SuperController::class, 'lihat_jumlah_employee'])->name('lihat_jumlah_employee');
Route::get('/super/lihat_jumlah_kriteria', [SuperController::class, 'lihat_jumlah_kriteria'])->name('lihat_jumlah_kriteria');
Route::get('/super/lihat_jumlah_users', [SuperController::class, 'lihat_jumlah_users'])->name('lihat_jumlah_users');
///Logout
Route::get('/super/logout', [SuperController::class, 'logout']);
// Route::get('/super/banned', [SuperController::class, 'banned']);
