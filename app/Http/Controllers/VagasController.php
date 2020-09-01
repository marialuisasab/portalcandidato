<?php

namespace App\Http\Controllers;
use App\Vaga;
use App\CurriculoVaga;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VagasController extends Controller
{

    public function __construct()
    {        
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $vagas = Vaga::orderBy('dtinicio','DESC')->get();
        return view('vaga.indexadmin', compact(['vagas']));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vaga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->validarFormulario($request, 'store');
        $user = Auth::user()->id;

        $v = new Vaga();       
        $v->dtinicio = Helper::setData($request->dtinicio);
    	//$v->dtfim
    	$v->dtprazo = Helper::setData($request->dtprazo);
    	$v->quant = $request->quant;
    	$v->titulo = $request->titulo;
    	$v->descricao = $request->descricao;
    	$v->requisitos = $request->requisitos;
    	$v->local = $request->local;
    	$v->status = $request->status;
    	$v->tpvaga = $request->tpvaga;
    	$v->pcd = $request->pcd;
    	$v->responsavel = $user;

    	if ($v->save()){                 
            flash('Informações gravadas com sucesso!')->success();
            return redirect()->route('listar');
        }else {
            flash('Falha ao gravar as informações!')->error();
            return redirect()->back();
        }      

    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidatos = Helper::listarCandidatosVaga($id);
       
        $vaga = Vaga::where('idvaga', $id)->get()[0];    
        //dd($candidatos);   
        return view('vaga.showadmin', compact('vaga',['candidatos']));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {	
    	$v = Vaga::find($id);
    	if(isset($v)){
            return view('vaga.edit', compact('v'));
        }   
        flash('Vaga não encontrada!')->error();
        return redirect()->back();
        
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
    	//$this->validarFormulario($request, 'update');
        $user = Auth::user()->id;
        $v = Vaga::find($id);
        
        if(isset($v)){
	        $v->dtinicio = Helper::setData($request->dtinicio);
	    	//$v->dtfim
	    	$v->dtprazo = Helper::setData($request->dtprazo);
	    	$v->quant = $request->quant;
	    	$v->titulo = $request->titulo;
	    	$v->descricao = $request->descricao;
	    	$v->requisitos = $request->requisitos;
	    	$v->local = $request->local;
	    	$v->status = $request->status;
	    	$v->tpvaga = $request->tpvaga;
	    	$v->pcd = $request->pcd;
	    	$v->responsavel = $user;

	    	if ($v->save()){                 
	                flash('Informações gravadas com sucesso!')->success();
	                return redirect()->route('listar');
	        }else {
	                flash('Falha ao gravar as informações!')->error();
	            return redirect()->back();
	        }      
	    }
    }

    public function encerrarVaga($id){
    	$user = Auth::user()->id;
        $v = Vaga::find($id);
        
        if(isset($v)){	      
        	//Vaga  
	    	$v->dtfim = Date('Y-m-d'); 	    	
	    	$v->status = 2;

	    	//Candidato_vaga
	    	$candidatos = CurriculoVaga::where('vaga_idvaga', $id)->get(); 
	    	foreach ($candidatos as $c) {
	    		if(isset($c)){
                    if($c->status == 1){
    	    			$c->status = 4;
    	    			if (!$c->save()){  
    			            flash('Falha ao gravar encerrar candidatura!')->error();
    			            return redirect()->back();
    	        		}      
                    }
	    		}	    		
	    	}

	    	if ($v->save()){                 
	                flash('Informações gravadas com sucesso!')->success();
	                return redirect()->route('listar');
	        }else {
	                flash('Falha ao gravar as informações!')->error();
	            return redirect()->back();
	        }      
	        //mandar e-mail automatico
	    }
    }

    public function copiarVaga($id){
    	$v = Vaga::find($id);
    	if(isset($v)){
            return view('vaga.copia', compact('v'));
        }   
        flash('Vaga não encontrada!')->error();
        return redirect()->back();
    }

    public function updateObservacao(Request $request){
    	
    	$processo = CurriculoVaga::where('curriculo_idcurriculo', $request->curriculo)
                                               ->where('vaga_idvaga',$request->vaga)->get()[0]; 

        if (isset($processo)){                      
            $processo->observ = $request->observ;
            if($processo->save()){
                flash('Observação inserida com sucesso!')->success();
                return redirect()->back();
            }else {
                flash("Falha ao gravar a observação!")->error();
                return redirect()->back();
            }
        }else {
            flash('Candidatura não encontrada!')->error();
            return redirect()->back();
        }
    }

    public function classificar($id, $v, $c){
    	$processo = CurriculoVaga::where('curriculo_idcurriculo', $c)
                                               ->where('vaga_idvaga',$v)->get()[0]; 
    	if($id == 2){//classificado    		
    		if (isset($processo)){
    			$processo->status = $id;
	            if($processo->save()){
	                flash('Candidato classificado com sucesso!')->success();
	                //mandar email automatico
	                return redirect()->back();

	            }else {
	                flash("Falha ao classificar o candidato!")->error();
                return redirect()->back();
	            }
	        }else {
	            flash('Candidatura não encontrada!')->error();
	            return redirect()->back();
	        }
    		
    	}else if ($id == 3) { //desclassificado
    		if (isset($processo)){
    			$processo->status = $id;
	            if($processo->save()){
	                flash('Candidato desclassificado com sucesso!')->success();
	                //mandar email automatico
	                return redirect()->back();

	            }else {
	                flash("Falha ao desclassificar o candidato!")->error();
                return redirect()->back();
	            }
	        }else {
	            flash('Candidatura não encontrada!')->error();
	            return redirect()->back();
	        }
    	}
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaga = Vaga::find($id);
        if (isset($vaga)){
        	if(count(Helper::listarCandidatosVaga($id))>0){
        		flash("Não é possível excluir uma vaga que já tenha candidatos inscritos!")->error();
                return redirect()->back();
        	}
            if ($vaga->delete()){    
                flash("Vaga excluida com sucesso!")->success();
                    return redirect()->route('listar');
                                
            }else {
                flash("Falha ao excluir a vaga!")->error();
                return redirect()->back();
                            
	        }
	    }
	}


    public function buscaAvancada(Request $request){
        
        $parametros = $request->except('_token');   
        $candidatos = Helper::filtrarCurriculos($parametros);
        //dd($candidatos);
        if(count($candidatos) == 0){
            flash('Não foi possível encontrar nenhum currículo com os filtros selecionados.')->error();
            return redirect()->route('detalhes',  $parametros['vagamodal']);
        }               
        $vaga = Vaga::where('idvaga', $parametros['vagamodal'])->get()[0]; 

        return view('vaga.showadmin', compact('candidatos', 'parametros', 'vaga'));      
    }



}
