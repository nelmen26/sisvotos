@extends('layouts.master')

@section('title')
    Cargos a Eleccion
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-list"></i>
		CARGOS A ELECCION
		<small>Actualizacion de datos del cargo a eleccion</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-list"></i> Actualizar datos del cargo a eleccion</h3>

	 	<div class="box-tools pull-right">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
	      		<i class="fa fa-minus"></i>
	      	</button>
	    	<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
	      		<i class="fa fa-times"></i>
	      	</button>
	  	</div>
	</div>
	<div class="box-body">
		{!! Form::model($tipo, ['route' => ['tipos.update', $tipo->id], 'method' => 'PUT']) !!}
			@include('tipos.partials.form')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection