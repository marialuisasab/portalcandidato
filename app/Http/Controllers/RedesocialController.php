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
    {   
        $flag = false;
        $todosnull = true;
        foreach ($request->link as $key => $value){        
            $rede = new RedeSocialCurriculo();           
            $rede->curriculo_idcurriculo = Helper::getIdCurriculo();
            $rede->redesocial_idredesocial = $request->redesocial_idredesocial[$key];
            $rede->link = $request->link[$key];
            if(!is_null($rede->link)){
                $todosnull = false;
            }
            if(!$todosnull){
                if($rede->save())
                    $flag = true;   
            }              
        }
        if($flag){
            flash("Informações gravadas com sucesso!")->success();
            return redirect()->route('redessociais');
                            // ->with('success', 'Dados cadastrados com sucesso!');
        }else {
             flash("Falha ao gravar as informações!")->error();
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
        $redes = RedeSocialCurriculo::where('curriculo_idcurriculo', $id)->get();
        
        return view('redesocial.edit', compact(['redes'], 'id'));
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
        $flag = true;
        foreach ($request->link as $key => $value){     
            $rede = RedeSocialCurriculo::where('curriculo_idcurriculo', $id)
                                           ->where('redesocial_idredesocial', $request->redesocial_idredesocial[$key])->get()[0]; 
            if(isset($rede)){   
               
                $rede->curriculo_idcurriculo = $id;
                $rede->redesocial_idredesocial = $request->redesocial_idredesocial[$key];
                $rede->link = $request->link[$key];
                
                if(!$rede->update())
                    $flag = false; 
            }                
        }
        if($flag){
            flash("Informações gravadas com sucesso!")->success();
            return redirect()->route('redessociais');
                            // ->with('success', 'Dados cadastrados com sucesso!');
        }else {
            flash("Falha ao gravar as informações!")->success();
            return redirect()->back();
                        // ->with('error', 'Falha ao gravar as informações!');
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

}
