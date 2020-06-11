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

class Helper
{   
    public static function getIdCurriculo(){
        $id = Curriculo::where('users_id', Auth::user()->id)->get()[0];
        return $id->idcurriculo;
    }
   
    public static function setData($stringData){
        if(!isset($stringData))
            return null;
        return  Carbon::parse(str_replace('/', '-',$stringData))->format('Y-m-d'); 
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
        return 'R$'.str_replace('.',',',$valor);
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
    $pais = Pais::orderBy('nome','ASC')->get();
    return $pais;
    }

    public static function getCidadesDoEstado($id){
        $cidades = Cidade::where('estado_idestado', $id)->orderBy('nome','ASC')->get();
        return $cidades;
    }

    public static function getEstado($id){
        $estado = Estado::select('uf')->where('idestado', $id)->get()[0];
        return $estado->uf;
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



}
