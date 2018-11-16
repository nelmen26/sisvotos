<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;
use SIS\Candidato;
use SIS\Mesa;
use SIS\Tipo;

class ResultadoController extends Controller
{
    public function index()
    {
        $graficos = collect();
        $totales = collect();
        $tipos = Tipo::where('estado','A')->get();
        foreach ($tipos as $tipo) {
            $labels = collect();
            $datos = collect();
            $colores = collect();
            $total = 0;
            foreach ($tipo->candidatos->where('estado','A') as $candidato) {
                $labels->push($candidato->nombre. ' ' .$candidato->apellidos);
                $colores->push($candidato->color);
                $datos->push($candidato->mesas()->sum('votos'));
                $total += $candidato->mesas()->sum('votos');
            }
            $totales->push($total);
            $chartjs = app()->chartjs
                            ->name('pieChartResultados'.$tipo->id)
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
            $graficos->push($chartjs);
        }
        
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
        return view('resultados.index',compact('graficos','tipos','totales','chartjs2','abiertos','cerrados','mesas'));
    }

    public function candidatos()
    {
        $candidatos = Candidato::where('tipo_id',1)->where('estado','A')->get();
        $total = 0;
        foreach ($candidatos as $candidato) {
            $total += $candidato->mesas()->sum('votos');
        }
        return view('resultados.candidatos',compact('candidatos','total'));
    }
}
