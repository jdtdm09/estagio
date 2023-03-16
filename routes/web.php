<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Event;

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
    $events = Event::all();
    return view('dashboard', compact('events'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', function () {
        $users = User::all();
        return view('users', compact('users'));
    })->name('users');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/events', function () {
        $events = event::all();
        return view('events', compact('events'));
    })->name('events');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users/create', [UserController::class, 'create'])->name('userCreate');
    Route::post('/users', [UserController::class, 'store'])->name('userStore');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/events/create', [EventController::class, 'create'])->name('eventCreate');
    Route::post('/events', [EventController::class, 'store'])->name('eventStore');
});



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('userEdit');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::put('/users/{user}', [UserController::class, 'update'])->name('userUpdate');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('userDelete');
});

require __DIR__.'/auth.php';
