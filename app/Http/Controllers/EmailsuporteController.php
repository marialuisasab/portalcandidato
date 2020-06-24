<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Auth;


class EmailsuporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('email.contato');
    }


    public function enviar(Request $request){
        
        $data = $request->all();

        Mail::send('email.template', $data, function ($message) {
            $message->from(env('MAIL_FROM_ADDRESS'))
                ->to('protheus@bioextratus.com.br')
                ->bcc('marialuisasab@gmail.com')
                ->replyTo(Auth::user()->email)
                ->subject('[Trabalhe Conosco - Bio Extratus] Suporte');
        }); 
        
        return redirect()->route('home')
            ->with('success', 'E-mail enviado com sucesso ao suporte!');
    
    }
}
