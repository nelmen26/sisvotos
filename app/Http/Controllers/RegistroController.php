<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;
use SIS\Http\Requests\RegistroRequest;
use SIS\Recinto;
use SIS\Mesa;
use SIS\Candidato;
use SIS\Tipo;

use Toastr;

class RegistroController extends Controller
{
    public function index(Request $request)
    {
        // $recintos = Recinto::search($request->buscar)->orderBy('nombre','ASC')->paginate('10');
        // return view('registros.index',compact('recintos'));

        $tipos = Tipo::where('estado','A')->get();
        // if($tipos->count()==0){
        //     return redirect()->route('tipos.index');
        // }
        // else{
        //     $recintos = Recinto::search($request->buscar)->orderBy('nombre','ASC')->paginate('10');
        //     return view('registros.index',compact('recintos'));
        // }

        $recintos = Recinto::search($request->buscar)->orderBy('nombre','ASC')->paginate('10');
        return view('registros.index',compact('recintos','tipos'));
    }

    public function mesas(Recinto $recinto)
    {
        $mesas = Mesa::where('recinto_id',$recinto->id)->get();
        return view('registros.mesas',compact('mesas','recinto'));
    }

    public function tipos(Mesa $mesa)
    {
        // $tipos = Tipo::where('estado','A')->get();
        // return view('registros.tipos',compact('tipos','mesa'));
        $tipos = Tipo::where('estado','A')->get();
        if($tipos->count()>1){
            return view('registros.tipos',compact('tipos','mesa'));
        }
        elseif($tipos->count()==1){
            $tipo=$tipos->first();
            $candidatos = Candidato::where('tipo_id',$tipo->id)->where('estado','A')->orderBy('id','ASC')->get();
            return view('registros.votos', compact('candidatos','mesa','tipo'));
        }
    }

    public function votos(Mesa $mesa, Tipo $tipo)
    {
        $candidatos = Candidato::where('tipo_id',$tipo->id)->where('estado','A')->orderBy('id','ASC')->get();
        return view('registros.votos', compact('candidatos','mesa','tipo'));
    }

    public function storevotos(RegistroRequest $request, Mesa $mesa)
    {
        $candidatos = Candidato::where('tipo_id',$request->tipo_id)->where('estado','A')->orderBy('id','ASC')->get();
		$lista = [];
        for ($i=1; $i <= count($candidatos); $i++) { 
            $lista = array_add($lista,$request->candidatos[$i-1],['votos'=>$request->votos[$i-1]]);
        }
        $mesa->candidatos()->attach($lista);
        $candidatos = Candidato::where('estado','A')->get();
        if($mesa->candidatos->count()==$candidatos->count())
        {
            $mesa->estado = "D";
            $mesa->save();
        }
        Toastr::success('Registro correcto de votos','Correcto!');
        // return redirect()->route('registros.mesas',$mesa->recinto_id);
        return redirect()->route('registros.index');
    }
}
