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
use Helper;
use PDF;

class PdfController extends Controller
{
    public function Gerarpdf($id){
      // Visualizar dados de um usuario pegando o id de seu curriculo
      set_time_limit(120);
      
      
      $users = User::all();
      $endereco = Endereco::all();
      $cursosform = Curso::where('curriculo_idcurriculo', $id)->get();
      $experiencia = Experiencia::where('curriculo_idcurriculo', $id)->orderBy('idexperiencia','ASC')->get();
      $habilidade = Habilidade::where('curriculo_idcurriculo', $id)->orderBy('idhabilidade','ASC')->get();
      $curriculos = Curriculo::where('idcurriculo', $id)->get();
      
      $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.pdf',compact('users','endereco','cursosform','experiencia','habilidade'),compact('curriculos'));

      return $pdf->setPaper('a4')->stream('Curriculo_Candidato.pdf');
      
      }

    //    public function Gerarpdf($id){
    //    $endereco = Endereco::all();
    //    $users = User::all();
    //    $dadoscurriculos = Curriculo::join('Curso','Curso.curriculo_idcurriculo', '=', 'idcurriculo')
    //    ->join('Experiencia', 'Experiencia.curriculo_idcurriculo', '=', 'idcurriculo')
    //    ->join('Habilidade', 'Habilidade.curriculo_idcurriculo', '=', 'idcurriculo')
    //    ->select('curso.*', 'curriculo.*','experiencia.*','habilidade.*')->where('idcurriculo', $id)->get();
    // //    return view('admin.buscarcurriculo')
    // //    ->with('users',$users)
    // //    ->with('endereco',$endereco)
    //   $pdf = PDF::loadView('admin.pdf',compact('users'),compact('dadoscurriculos'));
    //   return $pdf->setPaper('a4')->stream('Curriculo_Candidato.pdf');
    // //    ->with('dadoscurriculo',$dadoscurriculos);
    //    }

       
        // public static function listarCandidatosVaga($id){
        // return CurriculoVaga::join('Curriculo', 'idcurriculo','=', 'curriculo_idcurriculo')->join('Users', 'id',
        // '=','users_id')->where('vaga_idvaga', $id)->get();
        // }


}
