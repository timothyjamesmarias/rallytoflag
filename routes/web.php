<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Models\Event;
use App\Models\EventImage;

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
    return Inertia::render('Welcome');
});

Route::get('/help', function () {
    return Inertia::render('Help');
});

Route::get('/contact', function () {
    return Inertia::render('Contact');
});

Route::get('/about', function () {
    return Inertia::render('About');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
      'events' => Event::query()
        ->where('user_id', auth()->user()->id)
        ->addSelect(['image' => EventImage::select('path')
          ->whereColumn('event_id', 'events.id')
          ->limit(1)
        ])
        ->orderBy('created_at', 'desc')
        ->paginate(10)
        ->withQueryString()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('admin')->group(function () {
  Route::get('/admin', [AdminController::class, 'index'])->name('admin');
  Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
  Route::get('/admin/events', [AdminController::class, 'events'])->name('admin.events');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/events', [EventController::class, 'index'])->name('event.index');
Route::post('/events', [EventController::class, 'store'])->name('event.store')->middleware(['auth', 'verified']);;
Route::get('/events/new', [EventController::class, 'create'])->name('event.create')->middleware(['auth', 'verified']);;
Route::get('/events/{event}', [EventController::class, 'show'])->name('event.show');
Route::patch('/events/{event}', [EventController::class, 'update'])->name('event.update')->middleware(['auth', 'verified']);;
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('event.edit')->middleware(['auth', 'verified']);
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('event.destroy')->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
