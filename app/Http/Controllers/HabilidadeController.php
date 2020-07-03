<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habilidade;
use Helper;
use Illuminate\Support\Facades\Auth;


class HabilidadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $habilidades = Habilidade::join('curriculo', 'curriculo_idcurriculo', '=', 'idcurriculo')->where("users_id", Auth::user()->id)->get();

        if(count($habilidades)==0)
             return view('habilidade.create');
        return view('habilidade.index', compact('habilidades'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('habilidade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validarFormulario($request);
        $habilidade = new Habilidade();
        $habilidade->nome = mb_convert_case($request->nome, MB_CASE_TITLE, "UTF-8");
        $habilidade->nivel = $request->nivel;        
        $habilidade->curriculo_idcurriculo = Helper::getIdCurriculo();
        $habilidade->tipo_idtipo = $request->tipo_idtipo;
   
        if ($habilidade->save()){       
            flash("Informações gravadas com sucesso!")->success();  
                return redirect()->route('habilidades');
                        // ->with('success', 'Informações cadastradas com sucesso!');
        }else {
            flash("Falha ao gravar as informações!")->error();
            return redirect()->back();
                        // ->with('error', 'Falha ao gravar as informações!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hab = Habilidade::find($id);
        return view('habilidade.edit',compact(['hab']));
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
        $this->validarFormulario($request);

        $hab = Habilidade::find($id);

        if(isset($hab)){

            $hab->nome = mb_convert_case($request->nome, MB_CASE_TITLE, "UTF-8");
            $hab->nivel = $request->nivel;        
            $hab->curriculo_idcurriculo = Helper::getIdCurriculo();
            $hab->tipo_idtipo = $request->tipo_idtipo;
       
            if ($hab->save()){         
                flash("Informações gravadas com sucesso!!!")->success();
                    return redirect()->route('habilidades');
                            // ->with('success', 'Informações cadastradas com sucesso!');
            }else {
                flash("Falha ao gravar as informações!")->error();
                return redirect()->back()
                            ->with('error', 'Falha ao gravar as informações!');
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
        $habilidade = Habilidade::find($id);
        if (isset($habilidade)){
            if ($habilidade->delete()){         
                flash("Habilidade excluída com sucesso!")->success();
                    return redirect()->route('habilidades');
                                // ->with('success', 'Dados excluidos com sucesso!');
            }else {
                flash("Falha ao excluir as informações!")->error();
                return redirect()->back();
                            // ->with('error', 'Falha ao excluir as informações!');
            }  
        }
    }


    public function validarFormulario($request){
        
        $regras = [
            'nome'=>'required|max:50|string',
            'nivel' => 'required',
            'tipo_idtipo' => 'required',
        ];
        
        $mensagens = [
            'required' => 'Este campo não poderá estar em branco!',//mensagem genérica
            'max' => 'O tamanho do campo deve ser de até :max caracteres',
        ];

        $request->validate($regras, $mensagens);
    }
}
