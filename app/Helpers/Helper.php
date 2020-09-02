<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Cidade;
use App\Estado;
use App\Pais;
use App\Instituicao;
use App\Categoria;
use App\Curso;
use App\Area;
use App\Nivel;
use App\Curriculo;
use App\Tipo;
use App\RedeSocial;
use App\Admin;
use App\CurriculoVaga;
use App\Vaga;
use App\User;
use App\Experiencia;
use App\Endereco;
use App\Habilidade;

class Helper
{   
    public static function getIdCurriculo(){
        $id = Curriculo::select('idcurriculo')->where('users_id', Auth::user()->id)->get();
        
        if(count($id)==0){
            return false;
        } else {
            return $id[0]->idcurriculo;
        }
    }

      public static function getExperiencia($id){
      $experiencia = Experiencia::where('curriculo_idcurriculo',$id)->get();
      return $experiencia;
      }

    public static function getIdAdmin(){
        $admin = Admin::where('id', Auth::user()->id)->get();

        if(count($admin)==0){
            return false;
        } else {
            return true;
        }
    }

    public static function getIdCurriculomenu(){
        $id = Curriculo::where("users_id", Auth::user()->id)->get();
        if(count($id)==0){
            return false;
        } else {
            return true;
        }
    }
    
    public static function getIdCurriculoHome($id){

        $candidatoid = Curriculo::where("users_id",$id)->get()[0];
        return $candidatoid->idcurriculo;
    }



    public static function getvagatitulo($id){
        $vaga = Vaga::where('idvaga',$id)->get()[0];
        return $vaga->titulo;
    }

    public static function getVagaAberta(){
           $vaga = Vaga::where('status','3')->get();
           $tamanhovaga = ($vaga->count());
           return $tamanhovaga;
    }
   
    public static function setData($stringData){
        if(!isset($stringData))
            return null;
        return Carbon::parse(str_replace('/', '-',$stringData))->format('Y-m-d'); 
    }

    public static function getData($stringData){
        if(!isset($stringData))
            return null;
        return Carbon::parse(str_replace('-', '/',$stringData))->format('d/m/Y'); 
    }    

    public static function setPretensao($valor){
        return str_replace(',','.',$valor);
    }

    public static function getPretensao($valor){
        return 'R$'.$valor;
    }

    public static function getEstados(){
        $estados = Estado::orderBy('uf','ASC')->get();
        return $estados;
    }

    public static function getCidades(){
        $cidades = Cidade::orderBy('nome','ASC')->get();
        return $cidades;
    }

    public static function getPai(){
    $pais = Pais::orderBy('idpais','ASC')->get();
    return $pais;
    }

    public static function getCidadesDoEstado($id){
        $cidades = Cidade::where('estado_idestado', $id)->orderBy('nome','ASC')->get();
        return $cidades;
    }

    public static function getEstado($id){
        $estado = Estado::select('nome')->where('idestado', $id)->get()[0];
        return $estado->nome;
    }

    public static function getCidade($id){
        $cidade = Cidade::where('idcidade', $id)->get()[0];
        return $cidade->nome;
    }
    
    public static function getPais($id){
        $pais = Pais::where('idpais', $id)->get()[0];
        return $pais->nome;
    }

    public static function getCategorias(){
        $categorias = Categoria::orderBy('nome','ASC')->get();
        return $categorias;
    }

    public static function getInstituicoes(){
        $instituicoes = Instituicao::orderBy('nome','ASC')->get();
        return $instituicoes->status;
    }

    public static function getInstituicoesId($id){
     $instituicoes = Instituicao::where('idinstituicao', $id)->orderBy('nome','ASC')->get()[0];
     return $instituicoes->nome;
    }

    public static function getInstitui(){
    $instituicoes = Instituicao::orderBy('nome','ASC')->get();
    return $instituicoes;
    }


    public static function getAreas(){
        $areas = Area::orderBy('nome','ASC')->get();
        return $areas;
    }

    public static function getNiveis(){
        $niveis = Nivel::orderBy('nome','ASC')->get();
        return $niveis;
    }

    public static function getNivel($id){
        $nivel = Nivel::where('idnivel', $id)->get()[0];
        return $nivel->nome;
    }
    public static function getArea($id){
        $area = Area::where('idarea', $id)->get()[0];
        return $area->nome;
    }

    public static function getCategoria($id){
        $cat = Categoria::where('idcategoria', $id)->get()[0];
        return $cat->nome;
    }

    public static function getTiposHab(){
        return Tipo::orderBy('nome','ASC')->get();
    }
    public static function getTipoHab($id){
        $tp = Tipo::where('idtipo', $id)->get()[0];
        return $tp->nome;
    }
    public static function getRedes(){
        return RedeSocial::get();      
    }

    public static function getRedeCurriculo($id){
        $rs = RedeSocial::where('idredesocial', $id)->get()[0];
        return $rs->nome;    
    }

    public static function listarCandidatosVaga($id){
        return CurriculoVaga::join('curriculo', 'idcurriculo','=', 'curriculo_idcurriculo')
                    ->join('users', 'id', '=','users_id')
                    ->where('vaga_idvaga', $id)->get();         
    }

    public static function getStatusVaga($status){
        if ($status == 1) 
            return "Visível";            
        else if($status == 2)
            return "Oculta";
        else
            return "Em andamento";

    }

    public static function getStatusCandidatura($status){        
        if ($status == 1) 
            return "Em andamento";            
        else if($status == 2)
            return "Classificado(a)";
        else if($status == 3)
            return "Desclassificado(a)";
        else 
            return "Encerrado";
    }
    
    public static function getTodosCurriculos(){

        return Curriculo::join('users', 'id', '=', 'users_id')
                        ->orderBy('name', 'ASC')
                        ->paginate(50);       
        
    }

    public static function getCurriculoCompleto($id){

        $users = User::join('curriculo', 'users_id', '=', 'id')
                            ->where("idcurriculo", $id)->get();

        $curriculoVaga = CurriculoVaga::where('curriculo_idcurriculo', $id)
                            ->orderBy('dtcandidatura','DESC')->get();

        $cursos = Curso::where('curriculo_idcurriculo', $id)
                            ->orderBy('dtinicio','DESC')->get();

        $experiencia = Experiencia::where('curriculo_idcurriculo', $id)
                            ->orderBy('dtinicio','DESC')->get();

        $endereco = Endereco::join('curriculo', 'endereco_idendereco', '=', 'idendereco')
                            ->where("idcurriculo", $id)->get();

        $habilidade = Habilidade::where('curriculo_idcurriculo', $id)
                            ->orderBy('idhabilidade','ASC')->get();

        $curriculos = Curriculo::where('idcurriculo', $id)->get();

    
        return [$users, $curriculoVaga, $cursos, $endereco, $experiencia, $habilidade, $curriculos];
    }

    public static function getIdade($dtnasc){ 
        $data = \Carbon\Carbon::parse($dtnasc);
        $difAnos = \Carbon\Carbon::now()->diffInYears($data);
        return $difAnos;
    }


    public static function updateUltimaAtualização($id){
        $candidato = Curriculo::find($id);        
        $candidato->dtatualizacao = Date('Y-m-d');    
        if ($candidato->save()){
            return true;
        } 
        return false;
    }

    public static function filtrarCurriculos($dados){
        
        //dd($dados);
        $resultado = Curriculo::select('u.name', 'naturalidade', 'e.cidade_idcidade', 'dtatualizacao', 'idcurriculo')
                    ->join('users as u', 'users_id', '=', 'u.id')
                    ->join('endereco as e', 'endereco_idendereco', '=', 'e.idendereco')
                    ->join('curso as f', 'idcurriculo', '=', 'f.curriculo_idcurriculo')
                    ->join('experiencia as x', 'idcurriculo', '=', 'x.curriculo_idcurriculo')  
                    ->leftJoin('curriculo_vaga as v', 'idcurriculo', '=', 'v.curriculo_idcurriculo')
                    ->where(function ($query) use ($dados){

                        if(isset($dados['nomemodal']))
                            $query->where('u.name','like', '%'.$dados['nomemodal'].'%');                            
                        if(isset($dados['emailmodal']))
                            $query->where('u.email','like', '%'.$dados['emailmodal'].'%');
                        if(isset($dados['generomodal']))
                            $query->where('genero', $dados['generomodal']);
                        if(isset($dados['pcdmodal']))
                            $query->where('dfisico', $dados['pcdmodal']);
                        if(isset($dados['naturalidademodal']))
                            $query->where('naturalidade', $dados['naturalidademodal']);
                        if(isset($dados['catcnhmodal']))
                            $query->where('catcnh', $dados['catcnhmodal']);
                        if(isset($dados['cidadeatualmodal']))
                            $query->where('e.cidade_idcidade', $dados['cidadeatualmodal']);
                        if(isset($dados['escolaridademodal']))
                            $query->where('f.escolaridade', $dados['escolaridademodal']);
                        if(isset($dados['nivelmodal']))
                            $query->where('f.nivel_idnivel', $dados['nivelmodal']);
                        if(isset($dados['areamodal']))
                            $query->where('f.area_idarea', $dados['areamodal']);
                        if(isset($dados['nomecursomodal']))
                            $query->where('f.nome', 'like', '%'.$dados['nomecursomodal'].'%');
                        if(isset($dados['cargomodal']))
                            $query->where('x.cargo', 'like', '%'.$dados['cargomodal'].'%');
                        if(isset($dados['empresamodal']))
                            $query->where('x.empresa', 'like', '%'.$dados['empresamodal'].'%');
                        if(isset($dados['vagamodal']))
                            $query->where('v.vaga_idvaga', $dados['vagamodal']);
                    })
                    ->groupBy('u.name', 'naturalidade', 'e.cidade_idcidade', 'dtatualizacao', 'idcurriculo')
                    ->orderBy('dtatualizacao','DESC')                                  
                    ->paginate(100);
                   
        return $resultado;
    }

    public static function filtrarPalavraChave($palavra){


         $resultado = Curriculo::select('u.name', 'naturalidade', 'e.cidade_idcidade', 'dtatualizacao')
                    ->leftJoin('users as u', 'users_id', '=', 'u.id')
                    ->leftJoin('endereco as e', 'endereco_idendereco', '=', 'e.idendereco')
                    ->leftJoin('cidade as cid', 'e.cidade_idcidade', '=', 'cid.idcidade')
                    ->leftJoin('estado as est', 'e.estado_idestado', '=', 'est.idestado')
                    ->leftJoin('curso as f', 'idcurriculo', '=', 'f.curriculo_idcurriculo')
                    ->leftJoin('area as a', 'f.area_idarea', '=', 'a.idarea')
                    ->leftJoin('instituicao as i', 'f.instituicao_idinstituicao', '=', 'i.idinstituicao')
                    ->leftJoin('categoria as cat', 'f.instituicao_idinstituicao', '=', 'cat.idcategoria')
                    ->leftJoin('habilidade as h', 'idcurriculo', '=', 'h.curriculo_idcurriculo')
                    ->leftJoin('tipo as t', 'h.tipo_idtipo', '=', 't.idtipo')
                    ->leftJoin('experiencia as x', 'idcurriculo', '=', 'x.curriculo_idcurriculo')
                    ->leftJoin('curriculo_vaga as v', 'idcurriculo', '=', 'v.curriculo_idcurriculo')

                    ->where(function ($query) use ($palavra){
                        if(isset($palavra)){
                            $query->where('a.nome','like', '%'.$palavra.'%')
                                    ->orWhere('cat.nome','like', '%'.$palavra.'%')
                                    ->orWhere('cid.nome','like', '%'.$palavra.'%')
                                    ->orWhere('est.nome','like', '%'.$palavra.'%')
                                    ->orWhere('est.uf','like', '%'.$palavra.'%')
                                    ->orWhere('sobre', 'like', '%'.$palavra.'%')
                                    ->orWhere('f.nome','like', '%'.$palavra.'%')
                                    ->orWhere('i.nome', 'like', '%'.$palavra.'%')
                                    ->orWhere('f.escola','like', '%'.$palavra.'%')
                                    ->orWhere('h.nome','like', '%'.$palavra.'%')
                                    ->orWhere('e.logradouro','like', '%'.$palavra.'%')
                                    ->orWhere('x.empresa','like', '%'.$palavra.'%')
                                    ->orWhere('x.cargo','like', '%'.$palavra.'%')
                                    ->orWhere('x.atividades','like', '%'.$palavra.'%')
                                    ->orWhere('t.nome','like', '%'.$palavra.'%')
                                    ->orWhere('v.observ','like', '%'.$palavra.'%');
                        }
                    })

                    ->groupBy('u.name', 'naturalidade', 'e.cidade_idcidade', 'dtatualizacao')
                    ->orderBy('dtatualizacao','DESC')                    
                    ->paginate(50);  
                    //dd($resultado);     
         return $resultado;             

    }
}
