<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Curso;
use Helper;
use App\Instituicao;

class FormacaoController extends Controller
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
        $cursos = Curso::join('curriculo', 'curriculo_idcurriculo', '=', 'idcurriculo')->where("users_id", Auth::user()->id)->get();
    
        if(count($cursos)==0)
            return view('formacao.create');
        return view('formacao.index', compact(['cursos']));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formacao.create');
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
        
        $curso = new Curso();
        $curso->escolaridade = $request->escolaridade;
        $curso->nome = mb_convert_case($request->nome, MB_CASE_TITLE, "UTF-8");
        $curso->dtinicio =  Helper::setData($request->dtinicio);
        $curso->dtfim =  Helper::setData($request->dtfim);
        $curso->curriculo_idcurriculo = Helper::getIdCurriculo();
        $curso->instituicao_idinstituicao = $request->instituicao_idinstituicao;
        $curso->status = '1';

        if($request->escolaridade == '1'){            
            $curso->area_idarea = $request->area_idarea;//so para escolaridade sim        
            $curso->nivel_idnivel = $request->nivel_idnivel;//so para escolaridade sim
            if($request->nivel_idnivel == '7'|| $request->nivel_idnivel == '8'){
                $curso->periodo = $request->periodo;//so para esclaridade sim e nivel graduação
            }
        }else {
            $curso->categoria_idcategoria = $request->categoria_idcategoria;//só para escolaridade não (cursos) 
        }               
        //dd($curso);
        if ($curso->save()){         
            flash("Informações gravadas com sucesso!!!")->success();
                return redirect()->route('cursos');
                            // ->with('success', 'Dados cadastrados com sucesso!');
        }else {
                        flash("Falha ao gravar as informações!!!")->error();
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
        $curso = Curso::find($id);
        
        return view('formacao.edit', compact(['curso']));  
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

        $curso = Curso::find($id);

        if(isset($curso)){
            $curso->escolaridade = $request->escolaridade;
            $curso->nome = mb_convert_case($request->nome, MB_CASE_TITLE, "UTF-8");
            $curso->dtinicio =  Helper::setData($request->dtinicio);
            $curso->dtfim =  Helper::setData($request->dtfim);
            $curso->curriculo_idcurriculo = Helper::getIdCurriculo();
            $curso->instituicao_idinstituicao = $request->instituicao_idinstituicao;
            $curso->status = '1';

            if($request->escolaridade == '1'){            
                $curso->area_idarea = $request->area_idarea;//so para escolaridade sim        
                $curso->nivel_idnivel = $request->nivel_idnivel;//so para escolaridade sim
                if($request->nivel_idnivel == '7'|| $request->nivel_idnivel == '8'){
                    $curso->periodo = $request->periodo;//so para esclaridade sim e nivel graduação
                }
            }else {
                $curso->categoria_idcategoria = $request->categoria_idcategoria;//só para escolaridade não (cursos) 
            }               
            //dd($curso);
            if ($curso->save()){  
                 flash("Informações gravadas com sucesso!")->success();
                    return redirect()->route('cursos');
                                // ->with('success', 'Dados editados com sucesso!');
            }else {
                 flash("Falha ao editar as informações!")->error();
                return redirect()->back();
                            // ->with('error', 'Falha ao editar as informações!');
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
        $curso = Curso::find($id);
        if (isset($curso)){
            if ($curso->delete()){    
                flash("Formação excluida com sucesso!")->success();
                    return redirect()->route('cursos');
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
            'nome'=>'required|max:70|string',
            'escolaridade'=> 'required',
            'dtinicio' => 'required',
        ];

        if($request->escolaridade == '1'){
            $regras += [
                'nivel_idnivel'=>'required',
                'area_idarea' => 'required'
            ];
        }else {
            $regras += [
                'categoria_idcategoria'=>'required',               
            ];
        }
        
        $mensagens = [
            'required' => 'Este campo não poderá estar em branco! :attribute',//mensagem genérica
            'max' => 'O tamanho do campo deve ser de até :max',
            'integer' => 'Digite apenas números neste campo',
        ];

        $request->validate($regras, $mensagens);
    }


    public function getInstituicoes($id){
         $instituicoes = Instituicao::where('estado_idestado', $id)->orderBy('nome','ASC')->get();
         return $instituicoes;
         }
    

    
    }

   
