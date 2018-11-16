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
<?php $numero=0; ?>
@foreach ($tipos as $tipo)
<div class="box-group" id="accordion">
  <div class="panel box box-info">
    <div class="box-header with-border">
      <h4 class="box-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#{{ 'collapse'.$tipo->id }}">
            {{ $tipo->nombre }}
        </a>
      </h4>
    </div>
    <div id="{{ 'collapse'.$tipo->id }}" class="panel-collapse collapse">
      <div class="box-body">
          <div class="row">
            @foreach ($tipo->candidatos->where('estado','A') as $candidato)
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
                          {{ $totales[$numero]==0 ? '0': round($candidato->mesas()->sum('votos') * 100 / $totales[$numero],1) }}%
                      </span>
                      <div class="progress">
                        <div class="progress-bar" style="background-color:{{ $candidato->color }} ; width: {{ $totales[$numero]==0 ? '0': round($candidato->mesas()->sum('votos') * 100 / $totales[$numero],1) }}%">
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
      </div>
    </div>
  </div>
</div>
<?php $numero++; ?>
@endforeach

@endsection