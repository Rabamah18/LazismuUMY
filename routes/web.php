<?php

use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::view('/user', 'user.index')->name('user.index');
    Route::view('/ashnaf', 'ashnaf.index')->name('ashnaf.index');
    Route::view('/kabupaten', 'kabupaten.index')->name('kabupaten.index');
    Route::view('/lokasi', 'lokasi.index')->name('lokasi.index');
    Route::view('/penerimamanfaat', 'penerimamanfaat.index')->name('penerimamanfaat.index');
    Route::view('/penghimpunan', 'penghimpunan.index')->name('penghimpunan.index');
    Route::view('/penyaluran', 'penyaluran.index')->name('penyaluran.index');
    Route::view('/pilar', 'pilar.index')->name('pilar.index');
    Route::view('/programpilar', 'programpilar.index')->name('programpilar.index');
    Route::view('/programsumber', 'programsumber.index')->name('programsumber.index');
    Route::view('/provinsi', 'provinsi.index')->name('provinsi.index');
    Route::view('/sumberdana', 'sumberdana.index')->name('sumberdana.index');
    Route::view('/tahun', 'tahun.index')->name('tahun.index');
});

Route::view('/', 'public.home')->name('home');
Route::view('/about', 'public.about')->name('about');

require __DIR__.'/auth.php';
