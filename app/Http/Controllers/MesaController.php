<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\MesaRequest;

use SIS\Mesa;
use SIS\Recinto;
use Toastr;
use Yajra\DataTables\DataTables;

use SIS\Imports\MesasImport;
use Maatwebsite\Excel\Facades\Excel;

class MesaController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('mesas.index');
    }

    public function apiMesas()
    {
        $mesas = Mesa::with('recinto')->orderBy('recinto_id','ASC')->get();
        return Datatables::of($mesas)
                            // ->editColumn('estado', function($mesa){
                            //     return '<span class="label label-primary">'.$mesa->fullestado.'</span>';
                            // })
                            ->setRowClass(function ($mesa) {
                                return $mesa->estado == 'A' ? '' : 'bg-deshabilitado';
                            })
                            ->addColumn('action','mesas.partials.acciones')
                            // ->rawColumns(['action','estado'])
                            ->toJson();
    }

    public function create()
    {
        $recintos = Recinto::where('estado','A')->orderBy('nombre','ASC')->pluck('nombre','id');
        return view('mesas.create',compact('recintos'));
    }

    public function store(MesaRequest $request)
    {
        $mesa = Mesa::create($request->all());

        Toastr::success('Mesa creado con exito','Correcto!');

        return redirect()->route('mesas.index');
    }

    public function edit(Mesa $mesa)
    {
        $recintos = Recinto::where('estado','A')->orderBy('nombre','ASC')->pluck('nombre','id');
        return view('mesas.edit',compact('mesa','recintos'));
    }

    public function update(MesaRequest $request, Mesa $mesa)
    {
        $mesa->fill($request->all());
        $mesa->save();
        Toastr::info('Mesa actualizado con exito','Actualizado!');
        return redirect()->route('mesas.index');
    }

    public function destroy(Mesa $mesa)
    {
        $mesa->delete();
        Toastr::error('Mesa eliminado correctamente','Eliminado!');
        return back();
    }

    public function generar()
    {
        $recintos = Recinto::where('estado','A')->orderBy('nombre','ASC')->pluck('nombre','id');
        return view('mesas.generar', compact('recintos'));
    }

    public function storegenerar(Request $request)
    {
        // dd($request->all());
        $numero_mesa = $request->iniciar;
        for ($i=1; $i <= $request->cantidad; $i++) { 
            $mesa = new Mesa();
            $mesa->fill([
                'nombre' => 'Mesa - '.$numero_mesa++,
                'recinto_id' => $request->recinto_id,
                'estado' => 'A',
            ])->save();
        }
        Toastr::success('Se genero las mesas correspondiente del recinto','Correcto!');
        return redirect()->route('mesas.index');

    }

    public function importar()
    {
        return view('mesas.importar');
    }

    public function storeimportar(Request $request)
    {
        Excel::import(new MesasImport, $request->file('archivo'));

        Toastr::success('Se importo correctamente las Mesas','Correcto!');
        return redirect()->route('mesas.index');   
    }
}
