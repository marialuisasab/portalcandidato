<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Curriculo;
use Helper;
use App\Cidade;
use PDF;
use Response;


class CurriculosController extends Controller
{   
    public function __construct(){

        $this->middleware('auth:admin');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('curriculos.index');
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $dados = Helper::getCurriculoCompleto($id);                  
        $users = $dados[0];
        $curriculovaga = $dados[1];
        $cursos = $dados[2];
        $endereco = $dados[3];
        $experiencia = $dados[4]; 
        $habilidades = $dados[5]; 
        $curriculos = $dados[6];  
        $redes = $dados[7];      
        
        return view('curriculocompleto.show', compact(['users'], ['curriculovaga'], ['cursos'], ['endereco'], ['experiencia'], ['habilidades'], ['curriculos'],['redes']));          
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     // buscando dados dos usuarios que possuem curriculos e dos curriculos deste usuario
    public function buscar(){
        $users = DB::table('curriculo')
        ->join('users', 'curriculo.users_id', '=', 'users.id')
        ->leftJoin('endereco', 'curriculo.endereco_idendereco', '=', 'endereco.idendereco')
        // ->join('experiencia', 'curriculo.idcurriculo', '=', 'experiencia.curriculo_idcurriculo')
        ->select('users.*', 'curriculo.*','endereco.*')->orderBy('curriculo.dtatualizacao','DESC')
        ->paginate(50);


        return view('admin.buscarcurriculo')->with('users',$users);
    }

    public function getCidadesModal($id) {
        $cidades = Cidade::where('estado_idestado', $id)->orderBy('nome','ASC')->get();
        return Response::json($cidades);
    }



    public function gerarPdf($id){

        set_time_limit(120);   

        $dados = Helper::getCurriculoCompleto($id);                  
        $users = $dados[0];
        $curriculovaga = $dados[1];
        $cursos = $dados[2];
        $endereco = $dados[3];
        $experiencia = $dados[4]; 
        $habilidades = $dados[5]; 
        $curriculos = $dados[6];  
        $redes = $dados[7];   

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
                    ->loadView('curriculocompleto.show_pdf', compact(['users'], ['curriculovaga'], ['cursos'], ['endereco'], ['experiencia'], ['habilidades'], ['curriculos'], ['redes']));

        return $pdf->setPaper('a4')->download('Curriculo_Candidato.pdf');
      
      }

    
    public function updateObservacao(Request $request, $id){
        
        $candidato = Curriculo::find($id); 
       
        if (isset($candidato)){                      
            $candidato->obs = $request->obs;
            if($candidato->save()){
                flash('Observação inserida com sucesso!')->success();
                return redirect()->back();
            }else {
                flash("Falha ao gravar a observação!")->error();
                return redirect()->back();
            }
        }else {
            flash('Curriculo não encontrado!')->error();
            return redirect()->back();
        }
    }

    public function buscaPalavraChave(Request $request){
     
        $parametros = $request->except('_token');
        
        if(is_null($parametros['palavrachave'])){
            flash('Digite a palavra-chave para realizar a busca')->error();
            return redirect()->route('buscarcurriculo');
        } 
        $users = Helper::filtrarPalavraChave($parametros['palavrachave']);        
       
        if(count($users) == 0){
            flash('Não foi possível encontrar nenhum currículo com a palavra-chave selecionada.')->error();
            return redirect()->route('buscarcurriculo');
        }               
        return view('admin.buscarcurriculo', compact('users','parametros'));
    }


    public function buscaAvancada(Request $request){
        
        $parametros = $request->except('_token'); 

        $temParam = false;
        foreach ($parametros as $p => $valor) {
            if(!is_null($valor)){
                $temParam = true;
            }
        }
        if($temParam){  
            $users = Helper::filtrarCurriculos($parametros);
            if(count($users) == 0){
                flash('Não foi possível encontrar nenhum currículo com os filtros selecionados.')->error();
                return redirect()->route('buscarcurriculo');
            } 
        }else{
            flash('Selecione pelo menos um filtro para realizar a busca.')->error();
            return redirect()->route('buscarcurriculo');
        }      

        return view('admin.buscarcurriculo', compact('users', 'parametros'));      
    }

}
