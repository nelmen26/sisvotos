@extends('layouts.master')

@section('title')
    Candidato
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-user"></i>
		CANDIDATO
		<small>Actualizacion de datos del candidato</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-user"></i> Actualizar datos del candidato</h3>

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
		{!! Form::model($candidato, ['route' => ['candidatos.update', $candidato->id], 'method' => 'PUT','files'=>'true']) !!}
			@include('candidatos.partials.form')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection