@extends('layouts.master')

@section('title')
    Panel de Control
@endsection

@section('head-content')
    <h1>
        <i class="fa fa-dashboard"></i> SISTEMA
        <small>Panel de Control del Sistema</small>
    </h1>
@endsection

@section('main-content')
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-check-circle"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">REGISTRO DE VOTOS</span>
        <span class="info-box-number"> - </span>
        <a href="{{ route('registros.index') }}" class="btn btn-link">INGRESAR</a>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  @if(auth()->user()->rol == 'admin' || auth()->user()->rol == 'encargado')
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-pie-chart"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">RESULTADOS</span>
        <span class="info-box-number"> - </span>
        <a href="{{ route('resultados.index') }}" class="btn btn-link">INGRESAR</a>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">CANDIDATOS</span>
        <span class="info-box-number">{{ $candidatos }}</span>
        <a href="{{ route('resultados.candidatos') }}" class="btn btn-link">INGRESAR</a>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  @endif
  <!-- /.col -->
  @if(auth()->user()->rol=='admin')
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">USUARIOS</span>
        <span class="info-box-number">{{ $users }}</span>
        <a href="{{ route('users.index') }}" class="btn btn-link">VER</a>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  @endif
  <!-- /.col -->
</div>


<div class="row">
  <div class="col-md-12">
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-info-circle"></i> SIS-VOTOS</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <h1 class="lead text-center">
            SISTEMA DE REGISTRO Y CONTEO DE VOTOS
          </h1>
          <img src="{{ asset('img/logo.png') }}" class="center-block img-responsive logo">
          <p class="lead text-center">
            Sistema web desarrollado para el registro de los votos que obtuvieron los candidatos en las elecciones,
            para realizar el respectivo conteo de los votos y mostrar los resultados estadisticos de quien gano las elecciones
          </p>
        </div>
        <!-- /.box-body -->
      </div>
  </div>
</div>
@endsection

