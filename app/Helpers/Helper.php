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
        $id = Curriculo::where('users_id', Auth::user()->id)->get()[0];
        return $id->idcurriculo;
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
        $id = $candidato = Curriculo::where("users_id", Auth::user()->id)->get();
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

        /*return view('admin.visualizar_curriculos')
            ->with('curriculovaga', $curriculoVaga)
            ->with('users', $user)
            ->with('cursos', $cursos)
            ->with('endereco', $endereco)
            ->with('experiencia', $experiencia)
            ->with('habilidades', $habilidade)
            ->with('curriculos', $curriculos);*/
        return [$users, $curriculoVaga, $cursos, $endereco, $experiencia, $habilidade, $curriculos];
    }

    public static function getIdade($dtnasc){ 
        $data = \Carbon\Carbon::parse($dtnasc);
        $difAnos = \Carbon\Carbon::now()->diffInYears($data);
        return $difAnos;
    }

}
