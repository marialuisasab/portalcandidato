<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Curriculo;
use Helper;
use PDF;

class CurriculoController extends Controller
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
        $candidato = Curriculo::where("users_id", Auth::user()->id)->get();
    
        if(count($candidato)==0)
            return view('curriculo.create');
        return view('curriculo.index', compact(['candidato']));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       
        return view('curriculo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validarFormulario($request, 'store');

        $user = Auth::user();

        $c = new Curriculo();       

        $c->cpf = $request->cpf;
        $c->dtnascimento = Helper::setData($request->dtnascimento);
        $c->users_id = $user->id;
        $c->telefone1 = $request->telefone1;
        $c->telefone2 = $request->telefone2;
        $c->catcnh =  $request->catcnh;
        $c->cnh =  $request->cnh;
        $c->ufcnh =  $request->ufcnh;
        $c->dtcadastro = Date('Y-m-d');
        $c->dtatualizacao = Date('Y-m-d');
        $c->nomepai = mb_convert_case($request->nomepai, MB_CASE_TITLE, "UTF-8");
        $c->nomemae = mb_convert_case($request->nomemae, MB_CASE_TITLE, "UTF-8");
        $c->pretsalarial = Helper::setPretensao($request->pretsalarial);
        $c->dfisico =  $request->dfisico;
        $c->tpdeficiencia = $request->tpdeficiencia;
        $c->genero =  $request->genero;
        $c->sobre = $request->sobre;
        $c->ctps = $request->ctps;
        $c->nacionalidade = $request->nacionalidade; 
        $c->naturalidade = $request->naturalidade;
        $c->estadocivil = $request->estadocivil;
        $c->rg = $request->rg;

        if($request->hasFile('foto') && $request->file('foto')->isValid()){           
            $nomeArquivo = 'user_'.$user->id.'_'.mt_rand(1,1000);
            $extensao = $request->file('foto')->extension();
            $arquivo = "{$nomeArquivo}.{$extensao}";

            $upload = $request->file('foto')->move('fotos', $arquivo);
           
            if(!$upload){
                flash('Falha ao realizar upload da imagem')->error();
                return redirect()->back();
                            // ->with('error', 'Falha ao fazer upload da imagem');
            }
            $c->foto = $arquivo;                  
        }

        //dd($c);

        if ($this->updateUser($user, $c->foto, $request->nome) && $c->save()){            
           
            flash('Informações gravadas com sucesso!')->success();
            return redirect()->route('curriculo.dados');
                            // ->with('success', 'Dados cadastrados com sucesso!');
        }else{
            flash('Falha ao gravar as informações!')->error();
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
       
        //CURRICULO COMPLETO
        $dados = Helper::getCurriculoCompleto($id);                  
        $users = $dados[0];
        $curriculovaga = [];
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
         if ( Auth::check() ) {
         if ( Auth::user()->id == $id )
        $c = Curriculo::where("users_id", $id)->get()[0];
        $cidades = Helper::getCidades();
        if(isset($c)){
            return view('curriculo.edit', compact('c', 'cidades'));
        }
    }
        
        
        flash('Currículo não encontrado!')->error();
        return redirect()->back();
                // ->with('error', 'Currículo não encontrado!');
        
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
        $this->validarFormulario($request, 'update');
        $user = Auth::user();
        $c = Curriculo::where("users_id", $id)->get()[0];
        
        if(isset($c)){        
            $c->cpf = $request->cpf;
            $c->dtnascimento = Helper::setData($request->dtnascimento);
            $c->users_id = $user->id;
            $c->telefone1 = $request->telefone1;
            $c->telefone2 = $request->telefone2;
            $c->catcnh = $request->catcnh;
            $c->cnh = $request->cnh;
            $c->ufcnh = $request->ufcnh;
            $c->dtatualizacao = Date('Y-m-d');
            $c->nomepai = mb_convert_case($request->nomepai, MB_CASE_TITLE, "UTF-8");
            $c->nomemae = mb_convert_case($request->nomemae, MB_CASE_TITLE, "UTF-8");
            $c->pretsalarial = Helper::setPretensao($request->pretsalarial);
            $c->dfisico = $request->dfisico;
            $c->tpdeficiencia = $request->tpdeficiencia;
            $c->genero = $request->genero;
            $c->sobre = $request->sobre;
            $c->ctps = $request->ctps;
            $c->nacionalidade = $request->nacionalidade; 
            $c->naturalidade = $request->naturalidade;
            $c->estadocivil = $request->estadocivil;
            $c->rg = $request->rg;            
            $c->foto = $user->foto;

            if($request->hasFile('foto') && $request->file('foto')->isValid()){
                /*if($user->foto){
                    $nomeArquivo = $user->foto;
                    $arquivo = $nomeArquivo;
                }else{*/
                    $nomeArquivo = 'user_'.$user->id.'_'.mt_rand(1,1000);
                    $extensao = $request->file('foto')->extension();
                    $arquivo = "{$nomeArquivo}.{$extensao}";
                //}                
                $upload = $request->file('foto')->move('fotos', $arquivo);
               
                if(!$upload){
                    flash('Falha ao realizar upload da imagem!')->error();
                    return redirect()->back();
                                
                }
                $c->foto = $arquivo;                  
            }
            if ($this->updateUser($user, $c->foto, $request->nome) && $c->save()){   
                flash('Informações gravadas com sucesso!')->success();
                return redirect()->route('curriculo.dados');
            }else {
                flash('Falha ao gravar as informações!')->error();
                return redirect()->back();
            }
        }
        flash('Currículo não encontrado!')->error();
        return redirect()->back();
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

    public function updateUser($user, $foto, $nome)
    {
        //Editar o nome do usuário e foto
        $user->name = mb_convert_case($nome, MB_CASE_TITLE, "UTF-8");;
        $user->foto = $foto;   
        if ($user->save()){
            return true;
        }
    }

    public function validarFormulario($request, $method){

        $regras = [
            'nome'=>'required|string|max:100',
            'cpf' =>'required|size:11|cpf',
            'rg' => 'required|max:10',
            'pretsalarial' => 'required',
            'dtnascimento' => 'required',
            'genero' => 'required',
            'nomemae' => 'required|string',
            'dfisico' => 'required',
            'nacionalidade' => 'required',
            'naturalidade' => 'required',
            'telefone1' => 'required',
            'estadocivil' => 'required',
        ];
        if ($method == 'store') {
            $regras['cpf'] = 'required|size:11|unique:curriculo';
        }

        $mensagens = [
            'required' => 'Este campo não poderá estar em branco!',//mensagem genérica
            // 'cpf.unique' => 'Já existe um registro com este CPF em nosso cadastro',//mensagem específica
            'max' => 'O tamanho do campo deve ser de até :max caracteres',
            'integer' => 'Digite apenas números neste campo',
        ];

        $request->validate($regras, $mensagens);
    }

    public function gerarPdf($id){

        set_time_limit(120);   

        $dados = Helper::getCurriculoCompleto($id);                  
        $users = $dados[0];
        $curriculovaga = [];
        $cursos = $dados[2];
        $endereco = $dados[3];
        $experiencia = $dados[4]; 
        $habilidades = $dados[5]; 
        $curriculos = $dados[6];  
        $redes = $dados[7];   

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
                    ->loadView('curriculocompleto.show_pdf', compact(['users'], ['curriculovaga'], ['cursos'], ['endereco'], ['experiencia'], ['habilidades'], ['curriculos'],['redes']));

        return $pdf->setPaper('a4')->download('Curriculo_Candidato.pdf');
      
    }

    public function idcurriculo($id){
        $curriculo = Curriculo::where('users_id',$id)->get();
        return $curriculo;
    }

    public function cpf_existe_nao_pertence_user($cpf){
        $curriculo=Curriculo::where('cpf', $cpf)->get();
        if(count($curriculo)==0){
            return 1;
        } else {
            return 2;
        }
      
    }

    public function pegat_curriculo_cpf($cpf){
        $curriculo=Curriculo::where('cpf', $cpf)->get();
        return $curriculo;
    }

    public function cpf_existe_pertence_user($id){
        $dadoscurriculos = Curriculo::join('users','users.id', '=', 'users_id')
                                ->select('curriculo.*','users.*')->where('users_id', $id)->get();
        return $dadoscurriculos;
    }
         

}
