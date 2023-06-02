<?php

namespace App\Http\Controllers;
use PDF;

use App\Models\User;
use App\Models\Event;
use App\Models\Payment;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */

    public function generatePDF(Request $request, $eventId)
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        $userEmail = $user->email;
        $eventId = $eventId;
        $eventInfo = Event::where('id', $eventId)->first(); 
        $eventName = $eventInfo->nome;
        $payment = Payment::where('user_id', $userId)->where('event_id', $eventId)->first();

        if (!$payment) {
            return redirect()->route('dashboard')->with('message', 'Erro');
        }

        $paymentQrCode = $payment->qrcode;

        /*
        TODO: Fazer transform para qrcode
        */

        $data = [
            'title' => "Bilhete para {$eventName}",
            'date' => date('d/m/Y'),
            'name' => $eventName,
            'qrcode' => $paymentQrCode
        ];
        
        $pdf = PDF::loadView('myPDF', $data);
        
        // Salvar o PDF em um arquivo temporário
        $pdfPath = sys_get_temp_dir() . '/bilhete.pdf';
        $pdf->save($pdfPath);
        
        // Configurar o objeto PHPMailer
        $mail = new PHPMailer(true); // Passing `true` enables exceptions
        
        $mail->SMTPDebug = 3;
        $mail->Debugoutput = 'html';
        $mail->setLanguage('pt');
        $mail->isSMTP();
        $mail->Host = 'smtp.sapo.pt';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'diogomagalhaesestagio@sapo.pt';
        $mail->Password = 'Scan2gogo.';
        $mail->Port = 587;
        $mail->setFrom('diogomagalhaesestagio@sapo.pt');
        $mail->addReplyTo('rdiogomagalhaesestagio@sapo.pt');
        $mail->addAddress($userEmail, 'Utilizador');
        $mail->isHTML(true);
        $mail->Subject = 'Bilhete para ' . $eventName;
        $mail->Body = 'Segue em anexo o Bilhete para a entrada no Evento ' . $eventName;
        $mail->altBody = '';
        
        // Anexar o arquivo PDF
        $mail->addAttachment($pdfPath, 'bilhete.pdf');

        if (!$mail->send()) {
            return redirect()->route('dashboard')->with('message', 'erro');
        } else {
            return redirect()->route('dashboard')->with('mensagem', 'Verificar Email');
        }
        
        // Excluir o arquivo PDF temporário
        unlink($pdfPath);
        
        //return redirect()->route('dashboard')->with('mensagem', 'Verificar pdf');
    }

}