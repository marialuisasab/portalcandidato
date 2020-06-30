<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Curriculo;
use Helper;
use App\Estado;
use App\Cidade;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $candidato = Curriculo::where("users_id", Auth::user()->id)->get();

      
        return view('home', compact(['candidato']));
    }




    //  private $estadoModel;

    //  public function __construct(Estado $estado)
    //  {
    //  $this->estadoModel = $estado;
    //  }

    //  public function index()
    //  {
    //  $estados = $this->estadoModel->lists('estado', 'id');

    //  return view('cidade', compact('estados'));
    //  }

     public function getiCidades($idEstado)
     {
     $cidades = Cidade::where('estado_idestado', $idEstado)->orderBy('nome','ASC')->get();
     // return $cidade->nome;
     // $estado = $this->estadoModel->find($idEstado);
     // $cidades = $estado->cidades()->getQuery()->get(['id', 'cidade']);
     return Response::json($cidades);
     }



     public function getiCidadesVazias(){
       
        // $cidades = Cidade::orderBy('nome','ASC')->get();
    //    return Response::json($cidades);
    return true;
     }
}
