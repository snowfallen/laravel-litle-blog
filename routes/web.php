<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('post', '\App\Http\Controllers\PostController@index')
        ->name('post.index');
    Route::resource('post', PostController::class)
        ->except('index')
        ->middleware('role:writer');

    Route::resource('user', UserController::class)
        ->middleware('role:admin');

    Route::get('/ping', '\App\Http\Controllers\SolariumController@ping');
    Route::get('/reindex', '\App\Http\Controllers\SolariumController@reindex');

});

require __DIR__.'/auth.php';
