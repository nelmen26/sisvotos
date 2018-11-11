@extends('layouts.master')

@section('title')
    Candidatos
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-user"></i>
		CANDIDATOS
		<small>Listado de Candidatos registrados en el sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-user"></i> LISTA DE CANDIDATOS REGISTRADOS</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		<div>
			<a href="{{ route('candidatos.create') }}" class="btn btn-flat btn-primary">
				<i class="fa fa-plus"></i> NUEVO CANDIDATO
			</a>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				{!!Form::open(['route'=>'candidatos.index', 'method'=>'GET'])!!}
					<div>
						<div class="input-group input-group-sm">
								{{Form::text('buscar',null,['class'=>'form-control text-uppercase', 'placeholder'=>'Buscar candidato ...'])}}
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i></button>
								</span>
						</div>
					</div>
				{!!Form::close()!!}
			</div>
		</div>
		<br>
    <div class="row">
			@foreach ($candidatos as $candidato)
			<div class="col-md-3">
				<!-- Profile Image -->
				<div class="box" style="border-color:{{ $candidato->color }}">
					<div class="box-body box-profile">
							<img class="profile-user-img img-responsive img-circle" src="{{ asset('img/candidatos/'.$candidato->fotografia ) }}" alt="{{ $candidato->nombre }}" style="border-color:{{ $candidato->color }}">
							<h3 class="profile-username text-center">{{ $candidato->nombre }}</h3>
							<p class="text-muted text-center">{{ $candidato->apellidos }}</p>

							<ul class="list-group list-group-unbordered">
								<li class="list-group-item">
								<b>Tipo de Eleccion</b> <a class="pull-right">{{ $candidato->tipo->nombre }}</a>
								</li>
							</ul>

							<span class="label label-{{ $candidato->estado == 'A' ? 'success' : 'danger' }} pull-left">{{ $candidato->fullestado }}</span>
							<a href="" data-target="#modal-delete-{{ $candidato->id }}" data-toggle="modal" class="btn btn-xs btn-flat btn-danger pull-right"><i class="fa fa-trash"></i> Eliminar</a>
							<a href="{{ route('candidatos.edit',$candidato->id) }}" class="btn btn-xs btn-flat btn-info pull-right"><i class="fa fa-edit"></i> Editar</a>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			@include('candidatos.partials.modal')
			@endforeach
		</div>
    </div>
	<!-- /.box-body -->
</div>

@endsection
