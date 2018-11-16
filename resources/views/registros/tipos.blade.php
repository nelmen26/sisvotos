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
	 	<h3 class="box-title"><i class="fa fa-list"></i> LISTA DE CARGOS A ELECCION</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
      </button>
	  </div>
	</div>
	<div class="box-body">		
    @foreach ($tipos as $tipo)
      <a href="{{ $mesa->candidatos->contains('tipo_id',$tipo->id) ? '' : route('registros.votos', [$mesa->id,$tipo->id]) }}" class="btn btn-block btn-social btn-{{ $mesa->candidatos->contains('tipo_id',$tipo->id) ? 'danger' : 'default' }}" {{ $mesa->candidatos->contains('tipo_id',$tipo->id) ? 'disabled' : '' }}>
        <i class="fa fa-bookmark"></i> <span class="lead">{{ $tipo->nombre }}</span>
        <span class="label label-primary pull-right">{{ $tipo->candidatos->count() }} candidatos</span>
      </a>
    @endforeach  
  </div>
	<!-- /.box-body -->
	<div class="text-center">
		<a href="{{ route('registros.mesas',$mesa->recinto->id) }}" class="btn btn-flat btn-warning">VOLVER ATRAS</a>
		<a href="{{ route('registros.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>
	</div>
</div>

@endsection