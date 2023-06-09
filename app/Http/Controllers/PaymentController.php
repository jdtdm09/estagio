<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Event;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index()
{

    $payments = Payment::all();

    return [
        "status" => 1,
        "data" => $payments
    ];

}

    public function findSpecific($userId, $eventId)
{

    $specificPayment = Payment::where('user_id', $userId)->where('event_id', $eventId)->first();

    if ($specificPayment) {
        return [
            "status" => 1,
            "data" => $specificPayment
        ];
    } else {
        return [
            "status" => 2,
            "message" => "Não encontrado"
        ];
    }

}

    public function store(Request $request): RedirectResponse
{
    // Obtenha o ID do usuário autenticado
    $userId = auth()->user()->id;

    // Obtenha o ID do evento a partir dos parâmetros de URL
    $eventId = $request->route('evento');
    $metodo = $request->route('metodo');

    $existingPayment = Payment::where('user_id', $userId)->where('event_id', $eventId)->first();
    if ($existingPayment) {
        // Trate o caso em que já existe um pagamento com o mesmo userId e eventId, por exemplo, redirecionando ou exibindo uma mensagem de erro.
        return redirect()->route('dashboard')->with('message', 'Um pagamento já foi registrado para este usuário e evento.');
    }

    // Obtenha o preço do evento com o ID fornecido
    $event = Event::find($eventId);
    if (!$event) {
        // Trate o caso em que o evento não é encontrado, por exemplo, redirecionando ou exibindo uma mensagem de erro.
        return redirect()->route('events')->with('message', 'Evento não encontrado.');
    }

    // Verifique se há vagas disponíveis
    if ($event->vagas_disponiveis <= 0) {
        return redirect()->route('dashboard')->with('message', 'Não há mais vagas disponíveis para este evento.');
    }

    $amount = $event->preco;

    // Gere o código QR
    $qrcode = substr(md5(uniqid(mt_rand(), true)), 0, 63);
    $pin = substr(md5(uniqid(mt_rand(), true)), 0, 6);



    // Crie uma nova instância do modelo Pagamento e preencha os campos
    $pagamento = new Payment([
        'user_id' => $userId,
        'event_id' => $eventId,
        'amount' => $amount,
        'method' => $metodo,
        'reference' => '981017123',
        'qrcode' => $qrcode,
        'pin' => $pin
    ]);

    // Decrementar o número de vagas disponíveis
    $event->vagas_disponiveis -= 1;
    $event->save();
    // Salve o pagamento na base de dados
    $pagamento->save();



    // Redirecione ou retorne a resposta adequada, por exemplo:
    /*
    !Para ja tiramos isto para mandar para o pdf e depois do pdf é que vai para a dashboard
    * return redirect()->route('dashboard')->with('mensagem', 'Bilhete comprado com sucesso.');
     */

     return redirect()->route('generatePDF', ['eventId' => $eventId]);
    
}

}
