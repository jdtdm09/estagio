<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    public function index()
{
    $events = Event::all();
    
    // return view('listEvents', compact('events'));
    return [
        "status" => 1,
        "data" => $events
    ];
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
        'preco' => 'required|decimal'
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
        'preco' => $request->input('preco'),
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
        'imagem' => 'image',
        'preco' => 'required|string',
    ]);

    if ($request->hasFile('imagem')) {
        $requestData = $request->all();
        $fileName = time().$request->file('imagem')->getClientOriginalName();
        $path = $request->file('imagem')->storeAs('eventos', $fileName, 'public');
        $requestData["imagem"] = '/storage/'.$path;
        $event->imagem = $requestData["imagem"];
    }    

    if ($request->hasFile('imagem')) {
    $event->nome = $request->input('nome');
    $event->descricao = $request->input('descricao');
    $event->localizacao = $request->input('localizacao');
    $event->data_inicio = $request->input('data_inicio');
    $event->data_fim = $request->input('data_fim');
    $event->numero_vagas = $request->input('numero_vagas');
    $event->vagas_disponiveis = $request->input('vagas_disponiveis');
    $event->imagem = $requestData["imagem"];
    $event->preco = $request->input('preco');
    } else { 
        $event->nome = $request->input('nome');
        $event->descricao = $request->input('descricao');
        $event->localizacao = $request->input('localizacao');
        $event->data_inicio = $request->input('data_inicio');
        $event->data_fim = $request->input('data_fim');
        $event->numero_vagas = $request->input('numero_vagas');
        $event->vagas_disponiveis = $request->input('vagas_disponiveis');
        $event->preco= $request->input('preco');
    }
        $event->save();

    return redirect()->route('events')->with('flash_message', 'Evento Atualizado!');
}



    public function destroy($id)
{
    $event = Event::find($id);

    // Excluir os pagamentos relacionados ao evento
    Payment::where('event_id', $event->id)->delete();

    $event->delete();
    
    return redirect()->route('events');
}

    public function show(Event $event)
{
    return [
        "status" => 1,
        "data" => $event
    ];
}

public function checkQrCode($event)
{
    $userid = auth()->user()->id;
    $eventinfo = Event::find($event);
    $eventid = $eventinfo->id;
    $payment = Payment::where('user_id', $userid)->where('event_id', $eventid)->first();

    if ($payment && $payment->qrcode === request()->input('content')) {
        return response()->json(['message' => 'Bilhete Aceite']);
    } else {
        return response()->json(['message' => 'Bilhete Recusado']);
    }
}

public function verifyPin(Request $request, $eventId, $userId)
{
    $eventId = $request->route('eventId');
    $userId = $request->route('userId');
    $eventPin = $request->input('pin');

    $verifiedEnter = Payment::where('pin', $eventPin)->where('event_id', $eventId)->where('user_id', $userId)->first();

    if ($verifiedEnter) {
        return redirect()->route('dashboard')->with('mensagem', 'Bilhete Aceite!');
    } else {
        return redirect()->route('dashboard')->with('message', 'Bilhete Recusado!');
    }
}
}
