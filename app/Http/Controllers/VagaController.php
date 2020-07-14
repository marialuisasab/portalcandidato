<?php

namespace App\Http\Controllers;
use App\Vaga;
use App\CurriculoVaga;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $vagas = Vaga::where("status", 1)->get();
        return view('vaga.index', compact(['vagas']));
    }

    public function indexPrincipal()
    {   
        $vagas = Vaga::where("status", 1)->get();
        return view('principal', compact(['vagas']));
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
        if(is_null(Auth::user())){  
            $this->middleware('auth');
            flash('É necessário autenticar no sistema antes de se candidatar a uma vaga!')->error();
            return redirect()->route('login');
        } 
        $vaga = Vaga::where('idvaga', $id)->get()[0];       
        return view('vaga.show', compact(['vaga']));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('vaga.edit');
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

    public function candidatar($vaga){

        if(Helper::getIdCurriculomenu()){
            $candidato = Helper::getIdCurriculo();
            $candidatou = CurriculoVaga::where('curriculo_idcurriculo', $candidato)
                                               ->where('vaga_idvaga',$vaga)
                                               ->where("status", 1)->get(); 
            if (count($candidatou)==0){
                $dados = new CurriculoVaga();           
                $dados->curriculo_idcurriculo = $candidato;
                $dados->vaga_idvaga = $vaga;
                $dados->status = 1;
                $dados->dtcandidatura = Date('Y-m-d');
                if($dados->save()){
                    flash('Candidatura realizada com sucesso!')->success();
                    return redirect()->route('minhasvagas');//redirecionar para MINHAS VAGAS
                }else {
                    flash("Falha ao gravar as informações!")->error();
                    return redirect()->back();
                }
            }else {
                flash('Você já está participando deste processo seletivo! Vá para: Gerenciar Vagas > Minhas Vagas, para acompanhar o andamento.')->error();
                return redirect()->back();;//redirecionar para MINHAS VAGAS
            }
        }   else{
            flash('É necessário cadastrar seus dados no sistema antes de se candidatar a uma vaga!<br>Acesse no menu lateral: <i><b>Gerenciar Currículo > Dados Pessoais</i></b>, para iniciar o seu cadastro.')->error();
            return redirect()->back();
        }  
    }

    public function minhasvagas(){

        if(Helper::getIdCurriculomenu()){
            $cand = Helper::getIdCurriculo();
            $processos = CurriculoVaga::where('curriculo_idcurriculo', $cand)->get();
            $vagas = array();
            if(count($processos)>0){
                foreach ($processos as $p => $value) {
                    
                    $vagas[] = Vaga::where("status", 1)
                                ->where("idvaga", $value->vaga_idvaga)->get()[0];
                }        
            }
            
            return view('vaga.minhasvagas', compact(['processos'], ['vagas']));  
        } else{
            return view('vaga.minhasvagas');
        }

    }

}
