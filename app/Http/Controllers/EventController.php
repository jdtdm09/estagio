<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\RedirectResponse;

class EventController extends Controller
{
    public function index()
{
    $events = Event::all();
    
    return view('listEvents', compact('events'));
}

    public function create()
{
    return view('eventCreate');
}

    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'descricao' => 'required|max:800',
        'localizacao' => 'required|string|max:255',
        'data_hora' => 'required|date',
        'numero_vagas' => 'required|integer',
        'vagas_disponiveis' => 'required|integer',
    ]);

    $event = new Event([
        'nome' => $request->input('nome'),
        'descricao' => $request->input('descricao'),
        'localizacao' => $request->input('localizacao'),
        'data_hora' => $request->input('data_hora'),
        'numero_vagas' => $request->input('numero_vagas'),
        'vagas_disponiveis' => $request->input('vagas_disponiveis')
    ]);

    $event->save();

    return redirect()->route('events');
}

    public function edit($id)
{
    $event = Event::find($id);

    return view('eventEdit', ['event' => $event]);
}

//     public function update(Request $request, event $event)
// {
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|email|unique:users,email,'.$user->id,
//         'nTelemovel' => 'required|string|max:255',
//         'dataNascimento' => 'required|date',
//         'genero' => 'required|string',
//         'cargo' => 'nullable|boolean',
//     ]);

//     $user->name = $request->input('name');
//     $user->email = $request->input('email');
//     $user->nTelemovel = $request->input('nTelemovel');
//     $user->dataNascimento = $request->input('dataNascimento');
//     $user->genero = $request->input('genero');
//     $user->cargo = $request->input('cargo');

//     $user->save();

//     return redirect()->route('users');
// }

//     public function destroy($id)
// {
//     $user = User::find($id);
//     $user->delete();

//     return redirect()->route('users');
// }



}
