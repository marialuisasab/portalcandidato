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
            $message->from('automatico@bioextratus.com.br')
                ->to('protheus@bioextratus.com.br')
                ->bcc('marialuisasab@gmail.com')
                ->replyTo(Auth::user()->email)
                ->subject('[Trabalhe Conosco - Bio Extratus] Suporte');
        }); 
        
        flash("E-mail enviado ao suporte!
        Entraremos em contato em breve.
        Fique atento à sua caixa de entrada.")->success();
        return redirect()->route('home');    
    }
}
