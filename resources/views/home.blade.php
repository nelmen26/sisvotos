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
      <span class="info-box-icon bg-aqua"><i class="fa fa-bars"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Modulo 1</span>
        <span class="info-box-number">123</span>
        <a href="#" class="btn btn-link">VER DETALLES</a>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-building"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Modulo 2</span>
        <span class="info-box-number">123</span>
        <a href="#" class="btn btn-link">VER DETALLES</a>
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
      <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Modulo 3</span>
        <span class="info-box-number">123</span>
        <a href="#" class="btn btn-link">VER DETALLES</a>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-th"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Modulo 4</span>
        <span class="info-box-number">123</span>
        <a href="#" class="btn btn-link">VER DETALLES</a>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>


<div class="row">
  <div class="col-md-7">
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-info-circle"></i> NOMBRE DEL SISTEMA</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            PANEL 1
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            Footer 1
        </div>
        <!-- /.box-footer-->
      </div>
  </div>
  <div class="col-md-5">
    <!-- USERS LIST -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-users"></i> ULTIMOS DATOS REGISTRADOS</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        PANEL 2
      </div>
      <!-- /.box-body -->
      <div class="box-footer text-center">
        footer 2
      </div>
      <!-- /.box-footer -->
    </div>
    <!--/.box -->
  </div>
</div>
@endsection

