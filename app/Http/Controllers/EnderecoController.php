<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Endereco;
use App\Curriculo;
use Helper;

class EnderecoController extends Controller
{   
    private $endereco;

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
        $endereco = Endereco::join('curriculo', 'endereco_idendereco', '=', 'idendereco')->where("users_id", Auth::user()->id)->get();
       
        if(count($endereco)==0)
            return view('endereco.create');
        return view('endereco.index', compact(['endereco']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('endereco.create');    
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

        $e = new Endereco();
        $e->estado_idestado = $request->estado_idestado;
        $e->cidade_idcidade = $request->cidade_idcidade;
        $e->logradouro = mb_convert_case($request->logradouro, MB_CASE_TITLE, "UTF-8");
        $e->bairro = mb_convert_case($request->bairro, MB_CASE_TITLE, "UTF-8");
        $e->numero = $request->numero;
        $e->complemento = ($request->complemento != null ? mb_convert_case($request->complemento, MB_CASE_TITLE,"UTF-8") : $request->complemento );
        $e->pais_idpais = $request->pais_idpais;
        $e->cep = $request->cep;
        $e->disp_mudanca = $request->disp_mudanca;
        //dd($e);
        if ($e->save() && $this->updateCurriculo($e->idendereco)){         
                return redirect()->route('endereco')
                            ->with('success', 'Dados cadastrados com sucesso!');
        }else {
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao gravar as informações!');
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
        $e = Endereco::join('curriculo', 'endereco_idendereco', '=', 'idendereco')->where("users_id", Auth::user()->id)->get()[0];

        return view('endereco.edit',compact(['e']));
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

        $e = Endereco::join('curriculo', 'endereco_idendereco', '=', 'idendereco')->where("users_id", $id)->get()[0];

        if(isset($e)){

            $e->estado_idestado = $request->estado_idestado;
            $e->cidade_idcidade = $request->cidade_idcidade;
            $e->logradouro = mb_convert_case($request->logradouro, MB_CASE_TITLE, "UTF-8");
            $e->bairro = mb_convert_case($request->bairro, MB_CASE_TITLE, "UTF-8");
            $e->numero = $request->numero;
            $e->complemento = ($request->complemento != null ? mb_convert_case($request->complemento, MB_CASE_TITLE,"UTF-8") : $request->complemento);
            $e->pais_idpais = $request->pais_idpais;
            $e->cep = $request->cep;           
            $e->disp_mudanca = $request->disp_mudanca;

            if ($e->save()){         
                    return redirect()->route('endereco')
                                ->with('success', 'Dados cadastrados com sucesso!');
            }else {
                return redirect()
                            ->back()
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
        //
    }

    public function updateCurriculo($endereco){
        //Editar o id endereco na tabela curriculo
        $curriculo = Curriculo::find(Helper::getIdCurriculo());
        //$candidato = Curriculo::where("users_id", Auth::user()->id)->get();
        $curriculo->endereco_idendereco = $endereco;
        
        if ($curriculo->save()){
            return true;
        }
    }


    public function validarFormulario($request){
        
        $regras = [
            'cep'=>'required|size:9',
            'logradouro' => 'required|max:100',
            'bairro' => 'required|max:45',
            'numero' => 'required|integer',
            'cidade_idcidade' => 'required',
            'estado_idestado' => 'required',
            'pais_idpais' => 'required',
            'disp_mudanca' => 'required',
        ];
        
        $mensagens = [
            'required' => 'Este campo não poderá estar em branco! :attribute',//mensagem genérica
            'integer' => 'Digite apenas números neste campo',
            'max' => 'O tamanho do campo deve ser de até :max caracteres :attribute',
        ];

        $request->validate($regras, $mensagens);
    }
}
