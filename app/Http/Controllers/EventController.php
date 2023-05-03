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
    $requestData = $request->all();
    $fileName = time().$request->file('imagem')->getClientOriginalName();
    $path = $request->file('imagem')->storeAs('eventos', $fileName, 'public');
    $requestData["imagem"] = '/storage/'.$path;
    Event::create($requestData);
    return  redirect('events')->with('flash_message', 'Evento Adicionado!');

    $request->validate([
        'nome' => 'required|string|max:255',
        'descricao' => 'required|max:800',
        'localizacao' => 'required|string|max:255',
        'data_inicio' => 'required|date',
        'data_fim' => 'required|date',
        'numero_vagas' => 'required|integer',
        'vagas_disponiveis' => 'required|integer',
        'imagem' => 'required|image',
    ]);

    $event = new Event([
        'nome' => $request->input('nome'),
        'descricao' => $request->input('descricao'),
        'localizacao' => $request->input('localizacao'),
        'data_inicio' => $request->input('data_inicio'),
        'data_fim' => $request->input('data_fim'),
        'numero_vagas' => $request->input('numero_vagas'),
        'vagas_disponiveis' => $request->input('vagas_disponiveis'),
        'imagem' => $request->input('imagem'),
    ]);

    $event->save();

    return redirect()->route('events');
}

    public function edit($id)
{
    $event = Event::find($id);

    return view('eventEdit', ['event' => $event]);
}

public function update(Request $request, Event $event)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'descricao' => 'required|string|max:800',
        'localizacao' => 'required|string|max:255',
        'data_inicio' => 'required|date',
        'data_fim' => 'required|date',
        'numero_vagas' => 'required|integer',
        'vagas_disponiveis' => 'required|integer',
        'imagem' => 'required|image',
    ]);

    $requestData = $request->all();
    $fileName = time().$request->file('imagem')->getClientOriginalName();
    $path = $request->file('imagem')->storeAs('eventos', $fileName, 'public');
    $requestData["imagem"] = '/storage/'.$path;

    $event->nome = $request->input('nome');
    $event->descricao = $request->input('descricao');
    $event->localizacao = $request->input('localizacao');
    $event->data_inicio = $request->input('data_inicio');
    $event->data_fim = $request->input('data_fim');
    $event->numero_vagas = $request->input('numero_vagas');
    $event->vagas_disponiveis = $request->input('vagas_disponiveis');
    $event->imagem = $requestData["imagem"];

    $event->save();

    return redirect()->route('events')->with('flash_message', 'Evento Atualizado!');
}



    public function destroy($id)
{
    $event = Event::find($id);
    $event->delete();

    return redirect()->route('events');
}
}
