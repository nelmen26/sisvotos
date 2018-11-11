<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;
use SIS\Candidato;
use SIS\Mesa;

class ResultadoController extends Controller
{
    public function index()
    {
        $candidatos = Candidato::where('tipo_id',1)->where('estado','A')->get();
        $labels = collect();
        $datos = collect();
        $colores = collect();
        $total = 0;
        foreach ($candidatos as $candidato) {
            $labels->push($candidato->nombre. ' ' .$candidato->apellidos);
            $colores->push($candidato->color);
            $datos->push($candidato->mesas()->sum('votos'));
            $total += $candidato->mesas()->sum('votos');
        }
        $chartjs = app()->chartjs
                        ->name('pieChartResultados')
                        ->type('pie')
                        ->size(['width' => 250, 'height' => 150])
                        ->labels($labels->all())
                        ->datasets([
                            [
                                'backgroundColor' => $colores->all(),
                                'hoverBackgroundColor' => $colores->all(),
                                'data' => $datos->all()
                            ]
                        ])
                        ->options([
                            'legend' => [
                                'display' =>false,
                            ]
                        ]);
        
        $abiertos = Mesa::where('estado','A')->count();
        $cerrados = Mesa::where('estado','D')->count();
        $chartjs2 = app()->chartjs
                        ->name('pieChartMesas')
                        ->type('doughnut')
                        ->size(['width' => 250, 'height' => 150])
                        ->labels(['ABIERTOS','CERRADOS'])
                        ->datasets([
                            [
                                'backgroundColor' =>['#20a57d','#bd0f44'],
                                'hoverBackgroundColor' => ['#20a57d','#bd0f44'],
                                'data' => [$abiertos,$cerrados]
                            ]
                        ])
                        ->options([
                            'legend' => [
                                'display' =>false,
                            ]
                        ]);
        $mesas = Mesa::where('estado','D')->orderBy('updated_at','DESC')->get()->take(6);
        return view('resultados.index',compact('chartjs','candidatos','total','chartjs2','abiertos','cerrados','mesas'));
    }
}
