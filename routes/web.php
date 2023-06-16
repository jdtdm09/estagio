<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Profile\AvatarController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Event;
use App\Models\Payment;

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
    $events = Event::all();
    return view('welcome', compact('events'));
})->name('welcome');

Route::get('/dashboard', function () {
    $events = Event::all();
    return view('dashboard', compact('events'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
});

Route::get('/password-reset/{id}', function ($id) {
    return view('auth.reset-password', ['id' => $id]);
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
    Route::get('/paymentstable', function () {
        $payments = Payment::all();
        return view('paymentstable', compact('payments'));
    })->name('paymentstable');
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
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('eventEdit');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::put('/users/{user}', [UserController::class, 'update'])->name('userUpdate');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::put('/events/{event}', [EventController::class, 'update'])->name('eventUpdate');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('userDelete');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('eventDelete');
});

Route::get('/eventshow/{id}', function ($id) {
    $event = Event::find($id);
    return view('eventshow', compact('event'));
});

Route::get('/payments', function () {
    return view('payments');
});

Route::post('/payments/{evento}/{metodo}', [PaymentController::class, 'store'])->name('paymentProcess');

Route::get('/generate-pdf/{eventId}', [PDFController::class, 'generatePDF'])->name('generatePDF');

Route::post('/events/{event}/check-qr-code', [EventController::class, 'checkQrCode'])->name('events.checkQrCode');

Route::post('/user/send-email', [UserController::class, 'sendEmail'])->name('sendEmail');

Route::post('/user/reset-password/{id}', [UserController::class, 'updatePassword'])->name('updatePassword');

Route::post('/event/verify-pin/{eventId}/{userId}', [EventController::class, 'verifyPin'])->name('verifyPin');

Route::get('/paymentsregister', function () {
    $userId = auth()->id();
    $payments = Payment::where('user_id', $userId)->get();

    // Iterar sobre os pagamentos e buscar o nome do evento para cada um
    foreach ($payments as $payment) {
        $event = Event::find($payment->event_id); // Buscar o evento pelo ID do evento

        // Verificar se o evento foi encontrado
        if ($event) {
            $payment->event_name = $event->nome; // Adicionar o nome do evento ao objeto de pagamento
        } else {
            $payment->event_name = 'Evento não encontrado'; // Ou qualquer outra mensagem de erro desejada
        }
    }

    return view('paymentsRegister', compact('payments'));
})->name('paymentsregister');


require __DIR__.'/auth.php';
