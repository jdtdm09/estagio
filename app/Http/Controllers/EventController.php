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

    public function update(Request $request, event $event)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'descricao' => 'required|max:800',
        'localizacao' => 'required|string|max:255',
        'data_hora' => 'required|date',
        'numero_vagas' => 'required|integer',
        'vagas_disponiveis' => 'required|integer',
    ]);

    $event->nome = $request->input('nome');
    $event->descricao = $request->input('descricacao');
    $event->localizacao = $request->input('localizacao');
    $event->data_hora = $request->input('data_hora');
    $event->numero_vagas = $request->input('numroer_vagas');
    $event->vagas_disponiveis = $request->input('vagas_disponiveis');

    $event->save();

    return redirect()->route('events');
}

    public function destroy($id)
{
    $event = Event::find($id);
    $event->delete();

    return redirect()->route('events');
}
}
