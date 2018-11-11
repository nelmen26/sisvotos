<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\CandidatoRequest;

use SIS\Candidato;
use SIS\Tipo;
use Toastr;

use Illuminate\Support\Facades\Storage;

class CandidatoController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $candidatos = Candidato::search($request->buscar)->orderBy('id','ASC')->get();
        return view('candidatos.index',compact('candidatos'));
    }

    public function create()
    {
        $tipos = Tipo::where('estado','A')->orderBy('nombre','ASC')->pluck('nombre','id');
        return view('candidatos.create', compact('tipos'));
    }

    public function store(CandidatoRequest $request)
    {
        $candidato = new Candidato();
        $candidato->fill($request->all());
        if($request->file('foto')){
            $file = $request->file('foto');
            $extension = $file->guessExtension();
            $nombrefile = str_slug($request->apellidos) . ".".$extension;
            Storage::disk('public')->put('candidatos/' .$nombrefile,\File::get($file));
            $candidato->fill(['fotografia'=>$nombrefile]);
        }
        else{
            $candidato->fill(['fotografia'=>'default.jpg']);
        }

        $candidato->save();

        Toastr::success('Candidato creado con exito','Correcto!');

        return redirect()->route('candidatos.index');
    }

    public function edit(Candidato $candidato)
    {
        $tipos = Tipo::where('estado','A')->orderBy('nombre','ASC')->pluck('nombre','id');
        return view('candidatos.edit',compact('candidato','tipos'));
    }

    public function update(CandidatoRequest $request, Candidato $candidato)
    {
        $candidato->fill($request->all());

        if($request->file('foto')){
            $file = $request->file('foto');
            $extension = $file->guessExtension();
            $nombrefile = str_slug($request->apellidos) . ".".$extension;
            Storage::disk('public')->put('candidatos/' .$nombrefile,\File::get($file));

            $candidato->fill(['fotografia'=>$nombrefile]);
        }
        $candidato->save();
        Toastr::info('Candidato actualizado con exito','Actualizado!');
        return redirect()->route('candidatos.index');
    }

    public function destroy(Candidato $candidato)
    {
        $candidato->delete();
        Toastr::error('Candidato eliminado correctamente','Eliminado!');
        return back();
    }
}
