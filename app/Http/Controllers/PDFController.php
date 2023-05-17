<?php

namespace App\Http\Controllers;
use PDF;

use App\Models\User;
use App\Models\Event;
use App\Models\Payment;

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

        return $pdf->download('bilhete.pdf');

        /*
        TODO: Fazer a cena para mandar email
        */

        

        //return redirect()->route('dashboard')->with('mensagem', 'Verificar pdf');
    }

}
