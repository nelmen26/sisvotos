<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;
use SIS\Recinto;
use SIS\Mesa;
use SIS\Candidato;

use Toastr;

class RegistroController extends Controller
{
    public function index(Request $request)
    {
        $recintos = Recinto::search($request->buscar)->orderBy('nombre','ASC')->paginate('10');
        return view('registros.index',compact('recintos'));
    }

    public function mesas(Recinto $recinto)
    {
        $mesas = Mesa::where('recinto_id',$recinto->id)->get();
        return view('registros.mesas',compact('mesas'));
    }

    public function votos(Mesa $mesa)
    {
        $candidatos = Candidato::where('tipo_id',1)->where('estado','A')->orderBy('id','ASC')->get();
        return view('registros.votos', compact('candidatos','mesa'));
    }

    public function storevotos(Request $request, Mesa $mesa)
    {
        $candidatos = Candidato::where('tipo_id',1)->where('estado','A')->orderBy('id','ASC')->get();
		$lista = [];
        for ($i=1; $i <= count($candidatos); $i++) { 
            $lista = array_add($lista,$request['candidato'.$i],['votos'=>$request['votos'.$i]]);
        }
        $mesa->candidatos()->sync($lista);
        $mesa->estado = "D";
        $mesa->save();
        Toastr::success('Registro correcto de votos','Correcto!');
        return redirect()->route('registros.index');
    }
}
