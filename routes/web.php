<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatabasesController;

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
Route::get('/home', function () {
    return view('welcome');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('databases', \App\Http\Controllers\DatabasesController::class)->middleware(['auth', 'verified']);


Route::post('/databases', [DatabasesController::class, 'store'])->name('databases.store')->middleware(['auth', 'verified']);

Route::get('/mypost', [DatabasesController::class, 'myPosts'])->middleware(['auth', 'verified'])->name('mypost');

Route::get('/upload', function () {

    return view('databases.upload');
})->middleware(['auth', 'verified'])->name('upload');



Route::get('/master', function () {
    return view('master');
})->middleware(['auth', 'verified'])->name('master');

Route::get('/service', function () {
    return view('service');
})->middleware(['auth', 'verified'])->name('service');

Route::get('/transaction', function () {
    return view('transaction');
})->middleware(['auth', 'verified'])->name('transaction');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
