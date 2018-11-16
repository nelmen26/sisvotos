@extends('layouts.master')

@section('title')
    Mesas
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-th"></i>
		MESA
		<small>Generacion</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-th"></i> Generar Mesas de Recinto al Sistema</h3>

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
      {!! Form::open(['route' => 'mesas.storegenerar']) !!}
			{{-- <div class="form-group{{ $errors->has('recinto_id') ? ' has-error' : '' }}">
        {{ Form::label('recinto_id','RECINTOS') }}
        {{ Form::select('recinto_id', $recintos,null,['class'=>'form-control select', 'placeholder' => 'SELECCIONE UN RECINTO']) }}
        @if ($errors->has('recinto_id'))
              <span class="help-block">
                  <strong>{{ $errors->first('recinto_id') }}</strong>
              </span>
          @endif
      </div> --}}

      <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('recinto_id') ? ' has-error' : '' }}">
                    {{ Form::label('recinto_id','RECINTOS') }}
                    {{ Form::select('recinto_id', $recintos,null,['class'=>'form-control select', 'placeholder' => 'SELECCIONE UN RECINTO']) }}
                    @if ($errors->has('recinto_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('recinto_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                    {{ Form::label('tipo', 'TIPO') }}
                    {{ Form::select('tipo', ['docente' => 'DOCENTE', 'estudiante' => 'ESTUDIANTE'], null,['class'=> 'form-control select', 'id' => 'tipo','placeholder' => 'Seleccione el tipo']) }}
                
                    @if ($errors->has('tipo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tipo') }}</strong>
                        </span>
                    @endif
                
                </div>
            </div>
        </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
            {{ Form::label('cantidad', 'Cantidad de Mesas') }}
            {{ Form::number('cantidad',null,['class'=> 'form-control', 'placeholder'=>'0']) }}
            @if ($errors->has('cantidad'))
                <span class="help-block">
                    <strong>{{ $errors->first('cantidad') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group{{ $errors->has('iniciar') ? ' has-error' : '' }}">
            {{ Form::label('iniciar', 'Iniciar Mesa en') }}
            {{ Form::number('iniciar',null,['class'=> 'form-control', 'placeholder'=>'0']) }}
            @if ($errors->has('iniciar'))
                <span class="help-block">
                    <strong>{{ $errors->first('iniciar') }}</strong>
                </span>
            @endif
          </div>
        </div>
      </div>
			<div class="form-group text-center">
			{{ Form::submit('GENERAR MESAS', ['class'=>'btn btn-flat btn-primary']) }}
			<a href="{{ route('mesas.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>
		</div>
		{!! Form::close() !!}	
  </div>
	<!-- /.box-body -->
</div>

@endsection

@section('css')
 <!-- Select2 -->
 <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection

@section('scripts')
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function(){
        //Iniciando elementos Select2
        $('.select').select2();
    })
</script>
@endsection