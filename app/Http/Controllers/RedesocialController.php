<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\RedeSocialCurriculo;
use Helper;
use Illuminate\Support\Facades\Auth;

class RedesocialController extends Controller
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
        $idcurriculo = Helper::getIdCurriculo();
        $redes = RedeSocialCurriculo::where('curriculo_idcurriculo', $idcurriculo)->get();
        
        if(count($redes)==0)
            return view('redesocial.create');
        return view('redesocial.index', compact('redes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('redesocial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //https://twitter.com/_marialuisasab
        //https://www.linkedin.com/in/maria-lu%C3%ADsa-arcanjo-533390115/
        //$this->validarFormulario($request);
        dd($request);
        $rede = new RedeSocialCurriculo();       
       
        $rede->curriculo_idcurriculo = Helper::getIdCurriculo();
        $rede->redesocial_idredesocial = $request->redesocial_idredesocial;
        $rede->link = $request->link;
   
        if ($rede->save()){         
                return redirect()->route('redessociais')
                        ->with('success', 'Informações cadastradas com sucesso!');
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
}
