<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Curso;
use App\Curriculo;
use App\User;
use App\Experiencia;
Use App\Habilidade;
use App\Endereco;
use App\CurriculoVaga;

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
        $users = DB::table('users')
            ->join('curriculo', 'users.id', '=', 'curriculo.users_id')
            ->select('users.*', 'curriculo.*')->orderBy('name','ASC')
            ->paginate(20);

        return view('admin.buscarcurriculo')->with('users',$users);
    }



    // Visualizar dados de um usuario pegando o id de seu curriculo 
	public function visualizarcurriculos($id){
        $users = User::all();
        $curriculoVaga = CurriculoVaga::where('curriculo_idcurriculo',$id)->orderBy('vaga_idvaga','ASC')->get();
    	$cursosform = Curso::where('curriculo_idcurriculo', $id)->orderBy('nome','ASC')->get();
    	$experiencia = Experiencia::where('curriculo_idcurriculo', $id)->orderBy('idexperiencia','ASC')->get();
    	$endereco = Endereco::all();
    	$habilidade = Habilidade::where('curriculo_idcurriculo', $id)->orderBy('idhabilidade','ASC')->get();
    	$curriculos = Curriculo::where('idcurriculo', $id)->get();
        return view('admin.visualizar_curriculos')
                ->with('curriculovaga',$curriculoVaga)
    	        ->with('users',$users)
            	->with('cursos',$cursosform)
            	->with('endereco',$endereco)
            	->with('experiencia',$experiencia)
            	->with('habilidades',$habilidade)
            	->with('curriculos',$curriculos);
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


    // public function visualizarcurriculos($id){
    //     $endereco = Endereco::all();
	//     $users = User::all();
    //     $dadoscurriculos = DB::table('curriculo')
    //     // ->join('curriculo', $id, '=', 'curriculo.idcurriculo')
    //     ->join('curso','curriculo.idcurriculo', '=', 'cursos.curriculo_idcurriculo')
    //     ->join('experiencia', 'curriculo.idcurriculo', '=', 'experiencia.curriculo_idcurriculo')
    //     ->join('habilidade', 'curriculo.idcurriculo', '=', 'habilidade.curriculo_idcurriculo')
    //     ->select('cursos.*', 'curriculo.*','experiencia.*','habilidade.*')->get();
    //     return view('admin.buscarcurriculo')
    //      ->with('users',$users)
    //     ->with('endereco',$endereco)
    //     ->with('dadoscurriculo',$dadoscurriculos);
    // }

}
