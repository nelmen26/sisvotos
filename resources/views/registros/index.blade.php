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
	@if($tipos->count()==0)
		<h1 class="text-center">NO EXISTE CANDIDATOS</h1>
	@else
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
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!!Form::open(['route'=>'registros.index', 'method'=>'GET'])!!}
					<div>
						<div class="input-group input-group-sm">
								{{Form::text('buscar',null,['class'=>'form-control text-uppercase', 'placeholder'=>'Buscar recinto ...'])}}
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i></button>
								</span>
						</div>
					</div>
				{!!Form::close()!!}
			</div>
		</div>
		<br>
    @foreach ($recintos as $recinto)
      <a href="{{ route('registros.mesas', $recinto->id) }}" class="btn btn-block btn-social btn-default">
        <i class="fa fa-building"></i> {{ $recinto->nombre }}
        <span class="label label-success pull-right">{{ $recinto->mesas->count() }} Mesas</span>
      </a>
    @endforeach
    {!! $recintos->render() !!}   
	</div>
	@endif
	<!-- /.box-body -->
</div>

@endsection