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
      <h3 class="box-title text-center"><i class="fa fa-building"></i> {{ $mesa->recinto->nombre }} <small class="label label-default">{{ $mesa->nombre }}</small></h3>
	</div>
	<div class="box-body">
    {!! Form::open(['route' => ['registros.storevotos', $mesa->id]]) !!}
    <div class="row">
      <?php $numero = 1 ;?>
			@foreach ($candidatos as $candidato)
			<div class="col-md-3">
				<!-- Profile Image -->
				<div class="box" style="border-color:{{ $candidato->color }}">
					<div class="box-body box-profile">
            {!!Form::hidden("candidato".$numero,$candidato->id)!!}
            <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/candidatos/'.$candidato->fotografia ) }}" alt="{{ $candidato->nombre }}" style="border-color:{{ $candidato->color }}">
            <h3 class="profile-username text-center">{{ $candidato->nombre }}</h3>
            <p class="text-muted text-center">{{ $candidato->apellidos }}</p>
            {{ Form::label('votos','Cantidad de Votos') }}
            {{ Form::number('votos'.$numero,null,['class'=>'form-control','placeholder'=>'0']) }}
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
      </div>
      <?php $numero++; ?>
      @endforeach
    </div>
    <div class="text-center">
      {{ Form::submit('REGISTRAR',['class'=>'btn btn-success btn-flat']) }}
      <a href="{{ route('registros.mesas',$mesa->recinto->id) }}" class="btn btn-flat btn-warning">VOLVER ATRAS</a>
      <a href="{{ route('registros.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>
    </div>
    {!! Form::close() !!}
  </div>
	<!-- /.box-body -->
</div>

@endsection