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
	<h3 class="box-title"><i class="fa fa-th"></i> LISTA DE MESAS DEL RECINTO <strong>{{ $recinto->nombre }}</strong></h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		@if(!$recinto->mesas->where('tipo','docente')->isEmpty())
		<div class="row" style="padding-right:15px">
			<h1 class="text-center">DOCENTES</h1>
			@foreach ($mesas as $mesa)
				@if($mesa->tipo == 'docente')
				<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2" >
					<a href="{{ $mesa->estado=='D' ? '' : route('registros.tipos', $mesa->id) }}" class="btn btn-app btn-block bg-{{ $mesa->estado=='A' ? 'gray' : 'red' }}" {{ $mesa->estado=='D' ? 'disabled' : '' }}>
						<i class="fa fa-th"></i> {{ $mesa->nombre }}
					</a>
				</div>
				@endif
			@endforeach	
		</div>
		<br>
		<br>
		@endif
		@if(!$recinto->mesas->where('tipo','estudiante')->isEmpty())
		<div class="row" style="padding-right:15px">
			<h1 class="text-center">ESTUDIANTES</h1>
			@foreach ($mesas as $mesa)
				@if($mesa->tipo == 'estudiante')
				<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
					<a href="{{ $mesa->estado=='D' ? '' : route('registros.tipos', $mesa->id) }}" class="btn btn-app btn-block bg-{{ $mesa->estado=='A' ? 'gray' : 'red' }}" {{ $mesa->estado=='D' ? 'disabled' : '' }}>
					<i class="fa fa-th"></i> {{ $mesa->nombre }}
					</a>
				</div>
				@endif
			@endforeach
		</div>
		@endif	
  	</div>
	<!-- /.box-body -->
	<div class="box-footer text-center">
		<a href="{{ route('registros.index') }}" class="btn btn-flat btn-warning">VOLVER ATRAS</a>
	</div>
</div>

@endsection