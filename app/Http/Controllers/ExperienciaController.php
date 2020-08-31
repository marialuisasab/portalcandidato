<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Experiencia;
use Helper;

class ExperienciaController extends Controller
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
        $experiencias = Experiencia::join('curriculo', 'curriculo_idcurriculo', '=', 'idcurriculo')->where("users_id", Auth::user()->id)->get();

          if(count($experiencias)==0)
          return view('experiencia.create');
        return view('experiencia.index', compact('experiencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('experiencia.create');
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
        $exp = new Experiencia();
        $exp->empresa = mb_convert_case($request->empresa, MB_CASE_TITLE, "UTF-8");
        $exp->dtinicio =  Helper::setData($request->dtinicio);
        $exp->dtfim =  Helper::setData($request->dtfim);
        $exp->cargo = mb_convert_case($request->cargo, MB_CASE_TITLE, "UTF-8");
        $exp->atividades = $request->atividades;
        $exp->curriculo_idcurriculo = Helper::getIdCurriculo();
   
        if ($exp->save()){         
            flash("Informações gravadas com sucesso!")->success();
                return redirect()->route('experiencias');
                        // ->with('success', 'informações cadastradas com sucesso!');
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
        $exp = Experiencia::find($id);
     
        return view('experiencia.edit', compact(['exp']));  
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
        $exp = Experiencia::find($id);

        if(isset($exp)){
            $exp->empresa = mb_convert_case($request->empresa, MB_CASE_TITLE, "UTF-8");
            $exp->dtinicio =  Helper::setData($request->dtinicio);
            $exp->dtfim =  Helper::setData($request->dtfim);
            $exp->cargo = mb_convert_case($request->cargo, MB_CASE_TITLE, "UTF-8");
            $exp->atividades = $request->atividades;
            $exp->curriculo_idcurriculo = Helper::getIdCurriculo();
       
            if ($exp->save()){      
                Helper::updateUltimaAtualização(Helper::getIdCurriculo());
                flash("Informações gravadas com sucesso!")->success();
                    return redirect()->route('experiencias');
                                // ->with('success', 'informações cadastradas com sucesso!');
            }else {
                 flash("Falha ao gravar as informações!")->error();
                return redirect()->back();
                            // ->with('error', 'Falha ao gravar as informações!');
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
        $exp = Experiencia::find($id);
        if (isset($exp)){
            if ($exp->delete()){    
                 flash("Experiência excluida com sucesso!!")->success();
                    return redirect()->route('experiencias');
                                // ->with('success', 'Dados excluídos com sucesso!');
            }else {
                 flash("Falha ao excluir as informações!")->error();
                return redirect()->back();
                            // ->with('error', 'Falha ao excluir as informações!');
            }  
        }

    }

    public function validarFormulario($request){
        
        $regras = [
            'empresa'=>'required|max:70|string',
            'dtinicio'=> 'required',
            'cargo' => 'required|max:70|string',
        ];

        
        $mensagens = [
            'required' => 'Este campo não poderá estar em branco! ',//mensagem genérica
            'max' => 'O tamanho do campo deve ser de até :max',
        ];

        $request->validate($regras, $mensagens);
    }
}
