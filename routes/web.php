<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Profile\AvatarController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Notification;

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
    $notifications = Notification::all();
    $count = count($notifications);
    return view('dashboard', compact('events', 'notifications', 'count'));
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
    Route::get('/users', function () {
        $users = User::all();
        $notifications = Notification::all();
        $count = count($notifications);
        return view('users', compact('users', 'notifications', 'count'));
    })->name('users');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/events', function () {
        $events = Event::all();
        $notifications = Notification::all();
        $count = count($notifications);
        return view('events', compact('events', 'notifications', 'count'));
    })->name('events');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/notifications', function () {
        $notifications = Notification::all();
        $notifications = Notification::all();
        $count = count($notifications);
        return view('notifications', compact('notifications', 'notifications', 'count'));
    })->name('notifications');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/paymentstable', function () {
        $payments = Payment::all();
        $notifications = Notification::all();
        $count = count($notifications);
        return view('paymentstable', compact('payments', 'notifications', 'count'));
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
    Route::get('/notifications/create', [NotificationController::class, 'create'])->name('notificationCreate');
    Route::post('/notifications', [NotificationController::class, 'store'])->name('notificationStore');
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

Route::middleware(['auth', 'admin'])->group(function () {
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notificationDelete');
});

Route::get('/eventshow/{id}', function ($id) {
    $event = Event::find($id);
    $notifications = Notification::all();
    $count = count($notifications);
    return view('eventshow', compact('event', 'notifications', 'count'));
});

Route::get('/payments', function () {
    $notifications = Notification::all();
    $count = count($notifications);
    return view('payments', compact('notifications', 'count'));
});

Route::post('/payments/{evento}/{metodo}', [PaymentController::class, 'store'])->name('paymentProcess');

Route::get('/generate-pdf/{eventId}', [PDFController::class, 'generatePDF'])->name('generatePDF');

Route::post('/events/{event}/check-qr-code', [EventController::class, 'checkQrCode'])->name('events.checkQrCode');

Route::post('/user/send-email', [UserController::class, 'sendEmail'])->name('sendEmail');

Route::post('/user/reset-password/{id}', [UserController::class, 'updatePassword'])->name('updatePassword');

Route::post('/event/verify-pin/{eventId}/{userId}', [EventController::class, 'verifyPin'])->name('verifyPin');

Route::get('/paymentsregister', function () {
    $userId = auth()->id();
    $notifications = Notification::all();
    $count = count($notifications);
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

    return view('paymentsRegister', compact('payments', 'notifications', 'count'));
})->name('paymentsregister');


require __DIR__.'/auth.php';
