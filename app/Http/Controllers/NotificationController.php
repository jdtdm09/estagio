<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class NotificationController extends Controller
{

    
    public function index()
{
    $notifications = Notification::all();

    return [
        "status" => 1,
        "data" => $notifications
    ];
}

    //
    public function create()
{
    return view('notificationCreate');
}

    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'titulo' => 'required|string|max:255',
        'assunto' => 'required|max:800',
        'data' => 'date'
    ]);

    $notification = new Notification([
        'titulo' => $request->input('titulo'),
        'assunto' => $request->input('assunto'),
        'data' => date('Y/m/d'),
    ]);

    $notification->save();
    return redirect()->route('notifications');

}

    public function destroy($id)
{
    $notification = Notification::find($id);

    $notification->delete();
    
    return redirect()->route('notifications');
}
}
