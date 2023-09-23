<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KalenderController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\user\UserController as UserUserController;
use App\Http\Controllers\user\UserKalenderController;
use App\Http\Controllers\user\UserPeminjamanController;
use App\Http\Controllers\user\UserSaranController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::middleware('language')->group(function () {
    // File Manager
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    // Lang Switch
    Route::get('lang/{lang}', function ($lang) {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        return redirect()->back();
    })->name('lang');

    Route::controller(HomeController::class)->name('home.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/profil', 'profil')->name('profil');
        Route::get('/berita', 'berita')->name('berita');
        Route::get('/berita/{berita}', 'berita_show')->name('berita.show');
        Route::get('/galeri', 'galeri')->name('galeri');
        Route::get('/galeri/{galeri}', 'galeri_show')->name('galeri.show');
        Route::get('/kalender', 'kalender')->name('kalender');
        Route::get('/ruangan', 'ruangan')->name('ruangan');
        Route::get('/saran', 'saran')->name('saran');
        Route::post('/saran', 'storeSaran')->name('saran.store');
    });

    Route::middleware('auth', 'verified')->controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    });

    // User Route
    Route::middleware('role:user', 'auth')->prefix('user')->name('user.')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'user')->name('dashboard');
        });

        Route::controller(UserUserController::class)->group(function () {
            Route::get('kalender-grid', 'kalender')->name('kalender');
        });

        Route::resource('kalender', UserKalenderController::class)->except(['create', 'store', 'edit', 'update']);
        Route::resource('peminjaman', UserPeminjamanController::class);
        Route::resource('saran', UserSaranController::class);
    });

    // Admin Route
    Route::middleware('role:admin', 'auth')->prefix('admin')->name('admin.')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'admin')->name('dashboard');
        });

        Route::controller(AdminController::class)->group(function () {
            Route::get('log', 'log')->name('log.index');
            Route::get('kalender-grid', 'kalender')->name('kalender');
            Route::get('mail', 'mail')->name('mail.index');
            Route::post('mail', 'store_mail')->name('mail.store');
        });
        Route::resource('organisasi', OrganisasiController::class);
        Route::resource('ruangan', RuanganController::class);
        Route::resource('peminjaman', PeminjamanController::class);
        Route::resource('kalender', KalenderController::class);
        Route::resource('berita', BeritaController::class);
        Route::resource('galeri', GaleriController::class);
        Route::resource('saran', SaranController::class);

        Route::get('user/archive', [UserController::class, 'archive'])->name('user.archive');
        Route::post('user/restore/{id}', [UserController::class, 'restore'])->name('user.restore');
        Route::resource('user', UserController::class)->except('edit')->withTrashed(['*']);
    });
});

require __DIR__.'/auth.php';
