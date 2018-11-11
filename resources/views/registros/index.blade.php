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
	 	<h3 class="box-title"><i class="fa fa-list"></i> LISTA DE RECINTOS DONDE SE VOTA</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
      </button>
	  </div>
	</div>
	<div class="box-body">
    @foreach ($recintos as $recinto)
      <a href="{{ route('registros.mesas', $recinto->id) }}" class="btn btn-block btn-social btn-default">
        <i class="fa fa-building"></i> {{ $recinto->nombre }}
        <span class="label label-success pull-right">{{ $recinto->mesas->count() }} Mesas</span>
      </a>
    @endforeach
    {!! $recintos->render() !!}   
  </div>
	<!-- /.box-body -->
</div>

@endsection