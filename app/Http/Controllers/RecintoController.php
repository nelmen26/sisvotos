<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\RecintoRequest;

use SIS\Recinto;
use Toastr;
use Yajra\DataTables\DataTables;

use SIS\Imports\RecintosImport;
use Maatwebsite\Excel\Facades\Excel;

class RecintoController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('recintos.index');
    }

    public function apiRecintos()
    {
        $recintos = Recinto::orderBy('nombre','ASC')->get();
        return Datatables::of($recintos)
                            ->editColumn('estado', function($recinto){
                                return '<span class="label label-primary">'.$recinto->fullestado.'</span>';
                            })
                            ->editColumn('direccion', function($recinto){
                                return $recinto->direccion ? $recinto->direccion :'SIN DIRECCION';
                            })
                            ->addColumn('action','recintos.partials.acciones')
                            ->rawColumns(['action','estado'])
                            ->toJson();
    }

    public function create()
    {
        return view('recintos.create');
    }

    public function store(RecintoRequest $request)
    {
        $recinto = Recinto::create($request->all());

        Toastr::success('Recinto creado con exito','Correcto!');

        return redirect()->route('recintos.index');
    }

    public function edit(Recinto $recinto)
    {
        return view('recintos.edit',compact('recinto'));
    }

    public function update(RecintoRequest $request, Recinto $recinto)
    {
        $recinto->fill($request->all());
        $recinto->save();
        Toastr::info('Recinto actualizado con exito','Actualizado!');
        return redirect()->route('recintos.index');
    }

    public function destroy(Recinto $recinto)
    {
        $recinto->delete();
        Toastr::error('Recinto eliminado correctamente','Eliminado!');
        return back();
    }

    public function importar()
    {
        return view('recintos.importar');
    }

    public function storeimportar(Request $request)
    {
        Excel::import(new RecintosImport, $request->file('archivo'));

        Toastr::success('Se importo correctamente los recintos','Correcto!');
        return redirect()->route('recintos.index');

    }

}
