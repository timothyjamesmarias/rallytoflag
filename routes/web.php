<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/events', [EventController::class, 'index'])->name('event.index');
Route::post('/events', [EventController::class, 'store'])->name('event.store');
Route::get('/events/new', [EventController::class, 'create'])->name('event.create');
Route::get('/events/{event}', [EventController::class, 'show'])->name('event.show');
Route::put('/events/{event}', [EventController::class, 'update'])->name('event.update');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('event.edit');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('event.destroy');


require __DIR__.'/auth.php';
