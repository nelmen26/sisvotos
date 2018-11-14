@extends('layouts.master')

@section('title')
    Registro de Votos
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-check-circle"></i>
		REGISTRO
		<small>Registro de votos de los candidatos al sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-th"></i> LISTA DE MESAS DONDE SE VOTA</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
    @foreach ($mesas as $mesa)
      <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2" style="padding-left:0;">
        <a href="{{ $mesa->estado=='D' ? '' : route('registros.tipos', $mesa->id) }}" class="btn btn-app btn-block bg-{{ $mesa->estado=='A' ? 'gray' : 'red' }}" {{ $mesa->estado=='D' ? 'disabled' : '' }}>
          <i class="fa fa-th"></i> {{ $mesa->nombre }}
        </a>
      </div>
    @endforeach		
  </div>
	<!-- /.box-body -->
	<div class="box-footer text-center">
		<a href="{{ route('registros.index') }}" class="btn btn-flat btn-warning">VOLVER ATRAS</a>
	</div>
</div>

@endsection