<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Event;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request): RedirectResponse
{
    // Obtenha o ID do usuário autenticado
    $userId = auth()->user()->id;

    // Obtenha o ID do evento a partir dos parâmetros de URL
    $eventId = $request->route('evento');

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
    $amount = $event->preco;

    // Gere o código QR
    $qrcode = substr(md5(uniqid(mt_rand(), true)), 0, 63);



    // Crie uma nova instância do modelo Pagamento e preencha os campos
    $pagamento = new Payment([
        'user_id' => $userId,
        'event_id' => $eventId,
        'amount' => $amount,
        'reference' => '981017123',
        'qrcode' => $qrcode
    ]);

    // Salve o pagamento na base de dados
    $pagamento->save();

    // Redirecione ou retorne a resposta adequada, por exemplo:
    return redirect()->route('dashboard')->with('mensagem', 'Bilhete comprado com sucesso.');
}

}
