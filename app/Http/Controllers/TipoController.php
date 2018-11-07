<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\TipoRequest;

use SIS\Tipo;
use Toastr;
use Yajra\DataTables\DataTables;

class TipoController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('tipos.index');
    }

    public function apiTipos()
    {
        $tipos = Tipo::orderBy('nombre','ASC')->get();
        return Datatables::of($tipos)
                            ->editColumn('estado', function($tipo){
                                return '<span class="label label-primary">'.$tipo->fullestado.'</span>';
                            })
                            ->editColumn('descripcion', function($tipo){
                                return $tipo->descripcion ? $tipo->descripcion :'SIN DESCRIPCION';
                            })
                            ->addColumn('action','tipos.partials.acciones')
                            ->rawColumns(['action','estado'])
                            ->toJson();
    }

    public function create()
    {
        return view('tipos.create');
    }

    public function store(TipoRequest $request)
    {
        $tipo = Tipo::create($request->all());

        Toastr::success('Tipo creado con exito','Correcto!');

        return redirect()->route('tipos.index');
    }

    public function edit(Tipo $tipo)
    {
        return view('tipos.edit',compact('tipo'));
    }

    public function update(TipoRequest $request, Tipo $tipo)
    {
        $tipo->fill($request->all());
        $tipo->save();
        Toastr::info('Tipo actualizado con exito','Actualizado!');
        return redirect()->route('tipos.index');
    }

    public function destroy(Tipo $tipo)
    {
        $tipo->delete();
        Toastr::error('Tipo eliminado correctamente','Eliminado!');
        return back();
    }
}
