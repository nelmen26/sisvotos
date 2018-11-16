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

    public function index()
    {
        return view('tipos.index');
    }

    public function apiTipos()
    {
        $tipos = Tipo::orderBy('nombre','ASC')->get();
        return Datatables::of($tipos)
                            // ->editColumn('estado', function($tipo){
                            //     return '<span class="label label-primary">'.$tipo->fullestado.'</span>';
                            // })
                            ->editColumn('descripcion', function($tipo){
                                return $tipo->descripcion ? $tipo->descripcion :'SIN DESCRIPCION';
                            })
                            ->setRowClass(function ($tipo) {
                                return $tipo->estado == 'A' ? '' : 'bg-deshabilitado';
                            })
                            ->addColumn('action','tipos.partials.acciones')
                            // ->rawColumns(['action','estado'])
                            ->toJson();
    }

    public function create()
    {
        return view('tipos.create');
    }

    public function store(TipoRequest $request)
    {
        $tipo = Tipo::create($request->all());

        Toastr::success('Cargo creado con exito','Correcto!');

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
        Toastr::info('Cargo actualizado con exito','Actualizado!');
        return redirect()->route('tipos.index');
    }

    public function destroy(Tipo $tipo)
    {
        $tipo->delete();
        Toastr::error('Cargo eliminado correctamente','Eliminado!');
        return back();
    }

    public function darBaja(Tipo $tipo)
    {
        $tipo->estado = 'D';
        $tipo->save();
        Toastr::error('Cargo dado de baja correctamente!','Baja!');
        return back();
    }

    public function darAlta(Tipo $tipo)
    {
        $tipo->estado = 'A';
        $tipo->save();
        Toastr::success('Cargo dado de alta correctamente!','Alta!');
        return back();
    }
}
