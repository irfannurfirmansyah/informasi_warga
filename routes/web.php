<?php

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

// routes/web.php

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/setup-management', function () {
    return view('setup-management');
})->name('setup-management');

Route::get('/backup-db', function () {
    return view('backup-db');
})->name('backup-db');

Route::get('/perizinan-persuratan', function () {
    return view('perizinan-persuratan');
})->name('perizinan-persuratan');

Route::get('/laporan-keuangan', function () {
    return view('laporan-keuangan');
})->name('laporan-keuangan');

Route::get('/Master-data', function () {
    return view('Master-data');
})->name('Master-data');

Route::get('/data-rumah', function () {
    return view('data-rumah');
})->name('data-rumah');

Route::get('/surat-domisili', function () {
    return view('surat-domisili');
})->name('surat-domisili');

Route::get('/surat-pemasangan-infrastruktur', function () {
    return view('surat-pemasangan-infrastruktur');
})->name('surat-pemasangan-infrastruktur');

Route::get('/hunian-kontrak-mahasiswa', function () {
    return view('hunian-kontrak-mahasiswa');
})->name('hunian-kontrak-mahasiswa');

Route::get('/approval', function () {
    return view('approval');
})->name('approval');

Route::get('/data-warga', function () {
    return view('data-warga');
})->name('data-warga');