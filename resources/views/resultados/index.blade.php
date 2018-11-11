@extends('layouts.master')

@section('title')
    Resultados
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-pie-chart"></i>
		RESULTADOS DE VOTOS
		<small>Resultado global de los votos registrados en el sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-pie-chart"></i> RESULTADOS ESTADISTICOS DE CONTEO DE VOTOS</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
      </button>
	  </div>
	</div>
	<div class="box-body">
		<div class="row">
      <div class="col-md-8">
          {!! $chartjs->render() !!}
      </div>
      <div class="col-md-4">
        <p class="text-center">
          <strong>RESULTADOS</strong>
        </p>
        
        @foreach ($candidatos as $candidato)
        <div class="progress-group">
          <span class="progress-text">{{ $candidato->nombre }} {{ $candidato->apellidos }}</span>
          <span class="progress-number"><b>{{ $candidato->mesas()->sum('votos') }}</b>/{{ $total }}</span>

          <div class="progress ">
          <div class="progress-bar progress-bar-striped" style="background-color:{{ $candidato->color }} ; width: {{ round($candidato->mesas()->sum('votos') * 100 / $total,1) }}%">
              {{ round($candidato->mesas()->sum('votos') * 100 / $total,1) }}%
          </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
	<!-- /.box-body -->
</div>
<div class="row">
  <div class="col-md-4">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-pie-chart"></i> RESULTADOS DE MESAS</h3>

        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                </button>
          </div>
      </div>
      <div class="box-body">
        {!! $chartjs2->render() !!}
        <h4 class="text-center">CANTIDAD DE MESAS</h4>
        <table class="table table-bodered table-hover table-striped">
          <thead>
            <tr class="bg-black">
              <th>Mesas</th>
              <th>Cantidad</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td>ABIERTOS</td>
                <td>{{ $abiertos }}</td>
              </tr> 
              <tr>
                <td>CERRADOS</td>
                <td>{{ $cerrados }}</td>
              </tr> 
              <tr>
                <td><strong>TOTAL</strong></td>
                <td><strong>{{ $abiertos + $cerrados }}</strong></td>
              </tr> 
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
  <div class="col-md-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-th"></i> Ultimas 6 mesas cerradas</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table no-margin">
          <thead>
          <tr>
            <th>Rencito <span class="pull-right">Estado</span></th>
          </tr>
          </thead>
          <tbody>
            @foreach ($mesas as $mesa)  
            <tr>
              <td>
                {{ $mesa->recinto->nombre }} <br> <span class="label label-default">{{ $mesa->nombre }}</span><span class="label label-danger pull-right">{{ $mesa->fullestado }}</span>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('plugins/chartjs/Chart.js') }}"></script>
@endsection