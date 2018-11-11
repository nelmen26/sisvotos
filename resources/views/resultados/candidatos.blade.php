@extends('layouts.master')

@section('title')
    Candidatos
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-user"></i>
		CANDIDATOS
		<small>Listado de Candidatos</small>
	</h1>
@endsection

@section('main-content')
<div class="row">
  @foreach ($candidatos as $candidato)
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="box" style="border-color:{{ $candidato->color }}">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/candidatos/'.$candidato->fotografia ) }}" alt="{{ $candidato->nombre }}" style="border-color:{{ $candidato->color }}">
        <h3 class="profile-username text-center">{{ $candidato->nombre }}</h3>
        <p class="text-muted text-center">{{ $candidato->apellidos }}</p>

        <ul class="list-group list-group-unbordered" style="margin-bottom:0;">
          <li class="list-group-item">
            <b>POSTULA A</b> <a class="pull-right">{{ $candidato->tipo->nombre }}</a>
          </li>
          <li class="list-group-item">
            <b>VOTOS</b> <span class="pull-right">{{ $candidato->mesas()->sum('votos') }}</span>
          </li>
          <li class="list-group-item">
            <b>Porcentaje</b>
            <span class="pull-right">
                {{ round($candidato->mesas()->sum('votos') * 100 / $total,1) }}%
            </span>
            <div class="progress">
              <div class="progress-bar progress-bar-striped" style="background-color:{{ $candidato->color }} ; width: {{ round($candidato->mesas()->sum('votos') * 100 / $total,1) }}%">
              </div>
            </div>
          </li>
        </ul>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  @endforeach
</div>
@endsection