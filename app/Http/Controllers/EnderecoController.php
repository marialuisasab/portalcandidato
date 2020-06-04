<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Endereco;
use App\Curriculo;

class EnderecoController extends Controller
{   
    private $endereco;

    public function __construct()
    {
        $this->middleware('auth');
        //$this->$endereco = Endereco::join('curriculo', 'endereco_idendereco', '=', 'idendereco')
         //               ->where("users_id", Auth::user()->id)->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$id = Curriculo::select('endereco_idendereco')->where("users_id", Auth::user()->id)->get();
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
        $e = new Endereco();
        $e->estado_idestado = $request->estado_idestado;
        $e->cidade_idcidade = $request->cidade_idcidade;
        $e->logradouro = mb_convert_case($request->logradouro, MB_CASE_TITLE, "UTF-8");
        $e->bairro = mb_convert_case($request->bairro, MB_CASE_TITLE, "UTF-8");
        $e->numero = $request->numero;
        $e->complemento = mb_convert_case($request->complemento, MB_CASE_TITLE, "UTF-8");
        $e->pais_idpais = 1;
        $e->cep = $request->cep;
        $e->disp_mudanca = $request->disp_mudanca;
        
        if ($e->save() && $this->updateCurriculo(Auth::user()->id, $e->idendereco)){         
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
        $e = Endereco::join('curriculo', 'endereco_idendereco', '=', 'idendereco')->where("users_id", $id)->get()[0];

        if(isset($e)){

            $e->estado_idestado = $request->estado_idestado;
            $e->cidade_idcidade = $request->cidade_idcidade;
            $e->logradouro = mb_convert_case($request->logradouro, MB_CASE_TITLE, "UTF-8");
            $e->bairro = mb_convert_case($request->bairro, MB_CASE_TITLE, "UTF-8");
            $e->numero = $request->numero;
            $e->complemento = mb_convert_case($request->complemento, MB_CASE_TITLE, "UTF-8");
            $e->pais_idpais = 1;
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

    public function updateCurriculo($user, $endereco){
        //Editar o id endereco na tabela curriculo
        $curriculo = Curriculo::where("users_id", Auth::user()->id)->get()[0];
        $curriculo->endereco_idendereco = $endereco;
        if ($curriculo->save()){
            return true;
        }
    }
}
