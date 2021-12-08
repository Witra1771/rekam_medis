<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AntreanController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\tebusObatController;
use App\Http\Controllers\dataPasienController;
use App\Http\Controllers\dataPasienApotekerController;
use App\Http\Controllers\FlashMessageController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Livewire\Pemeriksaan;

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
Auth::routes();

Route::get('/login', function () {
    return view('login');
});
Route::POST('/login/proses', [LoginController::class, 'proses']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/prosesLogin', [LoginController::class, 'prosesLogin']);
//Admin
//Kelola User
Route::get('/kelola_user', [UserController::class, 'index']);
Route::POST('/kelola_user/tambah', [UserController::class, 'tambah']);
Route::POST('/kelola_user/ubah/{id_user}', [UserController::class, 'ubah']);
Route::get('/kelola_user/hapus/{id_user}', [UserController::class, 'hapus']);
Route::get('/run', [UserController::class, 'run']);
//Kelola Obat
Route::get('/kelola_obat', [ObatController::class, 'index']);
Route::POST('/kelola_obat/tambah', [ObatController::class, 'tambah']);
Route::POST('/kelola_obat/ubah/{id_obat}', [ObatController::class, 'ubah']);
Route::POST('/kelola_obat/hapus/{id_obat}', [ObatController::class, 'hapus']);
//Laporan
Route::get('/laporan', [LaporanController::class, 'index']);

//Pendaftaran
//Pendaftaran
Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
Route::POST('/pendaftaran/tambah', [PendaftaranController::class, 'tambah']);
Route::POST('/pendaftaran/ubah/{id_pasien}', [PendaftaranController::class, 'ubah']);
Route::POST('/pendaftaran/daftar/{id_pasien}', [PendaftaranController::class, 'daftar']);
Route::POST('/pendaftaran/hapus/{id_pasien}', [PendaftaranController::class, 'hapus']);
Route::GET('/no_antrean', [PendaftaranController::class, 'no_antrean']);
//Antrean
Route::get('/antrean', [AntreanController::class, 'index']);
Route::POST('/pendaftaran/tambah', [PendaftaranController::class, 'tambah']);
Route::POST('/kelola_user/ubah/{id_user}', [UserController::class, 'ubah']);
Route::POST('/pendaftaran/hapus/{id_pasien}', [PendaftaranController::class, 'hapus']);
Route::POST('/antrean/proses/{id_antrean}', [AntreanController::class, 'proses']);

//Dokter
//Pemeriksaan
Route::get('/pemeriksaan', [PemeriksaanController::class, 'index']);
Route::POST('/pemeriksaan/tambah', [PemeriksaanController::class, 'tambah']);
Route::POST('/pemeriksaan/tambahJiwa', [PemeriksaanController::class, 'tambahJiwa']);
Route::POST('/pemeriksaan/ubah/{id_}', [PemeriksaanController::class, 'ubah']);
Route::POST('/pemeriksaan/hapus/{id_pasien}', [PemeriksaanController::class, 'hapus']);
Route::get('/form_pemeriksaan/{id_antrean}', [PemeriksaanController::class, 'form_pemeriksaan']);

//Data Pasien
Route::get('/DataPasienDok', [PemeriksaanController::class, 'dataPasien']);

//Apoteker
//Kelola User
Route::get('/tebusObat', [tebusObatController::class, 'index']);
Route::POST('/tebusobat/tambah', [tebusObatController::class, 'tambah']);
Route::get('/dataPasienApoteker', [tebusObatController::class, 'dataPasien']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
