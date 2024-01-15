<?php

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\UserController;
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


/*
 * ----------------------------
 * Route disponible a la racine
 * ----------------------------
 */
Route::prefix('/')->name('root.')->controller(UserController::class)->group( function () {

    Route::get('/', 'index')->name('index');
});


/*
 * -----------------------------
 * Route disponible pour le user
 * -----------------------------
 */
Route::prefix('/user')->name('user.')->controller(UserController::class)->group( function () {

    Route::get('/', 'index');

    Route::get('/signup', 'createUser' )->name('signup');
    Route::post('/signup', 'tryStoreUser');

    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'checkLogin');


    Route::get('/dashboard', 'dashboard')->name('dashboard')->middleware('auth');
    Route::get('/profil', 'profil')->name('profil')->middleware('auth');


    Route::get('/programs', 'showPrograms')->name('showPrograms');
    Route::get('/program', 'showProgram')->name('showProgram');

    Route::post('/sondage', 'tryStoreSondage')->name('createS');

    Route::get('/sondages', 'showSondages')->name('sondages');

    Route::delete('/logout', 'logout')->name('logout');
});


Route::prefix('/user/candidat')->name('user.candidat.')->controller(CandidatController::class)->group( function () {

    Route::get('/', 'index');


    Route::get('/admin', 'admin')->name('admin');
    Route::post('/admin', 'create')->name('create');
});
