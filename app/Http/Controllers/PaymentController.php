<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Event;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PDF;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;

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

    // Gera o código QR Code e o PIN
    $qrcode = substr(md5(uniqid(mt_rand(), true)), 0, 63);
    $pin = substr(md5(uniqid(mt_rand(), true)), 0, 6);

    // Verifica se o QR Code ou o PIN já extistem na base de dados
    $existingQrcode = Payment::where('qrcode', $qrcode)->first();
    $existingPin = Payment::where('pin', $pin)->first();

    // Caso já esista na base de dados, é criado um QR Code ou um PIN novo
    while ($existingQrcode) {
        $qrcode = substr(md5(uniqid(mt_rand(), true)), 0, 63); 
    }

    while ($existingPin) {
        $pin = substr(md5(uniqid(mt_rand(), true)), 0, 6);
    }

    // Gera uma referencia
    $reference = substr(md5(uniqid(mt_rand(), true)), 0, 9);

    // Verifica se a referencia já exista na base de dados
    $existingReference = Payment::where('reference', $reference)->first();

    // Caso já exista na base de dados, é criada uma referencia nova
    while ($existingReference) {
        $reference = substr(md5(uniqid(mt_rand(), true)), 0, 9);
    }


    $pagamento = new Payment([
        'user_id' => $userId,
        'event_id' => $eventId,
        'amount' => $amount,
        'method' => $metodo,
        'reference' => $reference,
        'qrcode' => $qrcode,
        'pin' => $pin
    ]);

    // Decrementa o número de vagas disponíveis
    $event->vagas_disponiveis -= 1;
    $event->save();
    // Salva o pagamento na base de dados
    $pagamento->save();



    // Redirecione ou retorne a resposta adequada, por exemplo:
    /*
    !Para ja tiramos isto para mandar para o pdf e depois do pdf é que vai para a dashboard
    * return redirect()->route('dashboard')->with('mensagem', 'Bilhete comprado com sucesso.');
     */

     return redirect()->route('generatePDF', ['eventId' => $eventId]);
    
}

    public function createPayment(Request $request)
{
    $data = $request->json()->all();
    $userId = $data['userId'];
    $eventId = $data['eventId'];
    $metodo = $data['metodo'];
    
    $user = User::find($userId);
    $userEmail = $user->email;
    
    $existingPayment = Payment::where('user_id', $userId)->where('event_id', $eventId)->first();
    if ($existingPayment) {
        return response()->json(['message' => 'Um pagamento já foi registrado para este usuário e evento.'], 400);
    }

    $event = Event::find($eventId);
    if (!$event) {
        return response()->json(['message' => 'Evento não encontrado.'], 404);
    }

    if ($event->vagas_disponiveis <= 0) {
        return response()->json(['message' => 'Não há mais vagas disponíveis para este evento.'], 400);
    }

    $amount = $event->preco;
	
    $qrcode = substr(md5(uniqid(mt_rand(), true)), 0, 63);
    $pin = substr(md5(uniqid(mt_rand(), true)), 0, 6);
    
    //var_dump($pin);
	//die();

    $payment = new Payment([
        'user_id' => $userId,
        'event_id' => $eventId,
        'amount' => $amount,
        'method' => $metodo,
        'reference' => '981017123',
        'qrcode' => $qrcode,
        'pin' => $pin
    ]);

    $event->vagas_disponiveis -= 1;
    $event->save();

    $payment->save();

    //enviar email com pdf

    $eventName = $event->nome;

    $data = [
            'title' => "Bilhete para {$eventName}",
            'date' => date('d/m/Y'),
            'name' => $eventName,
            'qrcode' => $qrcode,
            'pin'   => $pin
        ];
        
        $pdf = PDF::loadView('myPDF', $data);
        
        // Salvar o PDF em um arquivo temporário
    	$tempFolderPath = public_path('temp');
        $pdfPath = $tempFolderPath . '/bilhete.pdf';
        //$pdf->save($pdfPath);
        
        // Configurar o PHPMailer
        $mail = new PHPMailer(true); 
        
        $mail->SMTPDebug = 3;
        $mail->Debugoutput = 'html';
        $mail->setLanguage('pt');
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tsl';
        $mail->Username = 'diogomagalhaesestagio@gmail.com';
        $mail->Password = 'ouugxtvdqzpohffv';
        $mail->Port = 465;
        $mail->setFrom('diogomagalhaesestagio@gmail.com');
        $mail->addReplyTo('rdiogomagalhaesestagio@gmail.com');
        $mail->addAddress($userEmail, 'Utilizador');
        $mail->isHTML(true);
        $mail->Subject = 'Bilhete para ' . $eventName;
        $mail->Body = 'Segue em anexo o Bilhete para a entrada no Evento ' . $eventName;
        $mail->altBody = '';
        
        // Anexar o arquivo PDF
        $mail->addAttachment($pdfPath, 'bilhete.pdf');

        // Excluir o arquivo PDF temporário
        //unlink($pdfPath);

        if (!$mail->send()) {
            return response()->json(['message' => 'Erro a mandar email, mas pagamento registado.'], 400);
        } else {
            return response()->json(['message' => 'Pagamento registado com sucesso.'], 200);
        }
        
        //return response()->json(['message' => 'Pagamento registado com sucesso.'], 200);
}


}
