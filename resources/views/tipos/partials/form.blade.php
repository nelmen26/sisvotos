<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
    {{ Form::label('nombre', 'Nombre') }}
    {{ Form::text('nombre',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'NOMBRE DEL TIPO DE ELECCION']) }}
    @if ($errors->has('nombre'))
        <span class="help-block">
            <strong>{{ $errors->first('nombre') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{ Form::label('descripcion', 'Descripcion') }}
    {{ Form::textarea('descripcion',null,['class'=> 'form-control text-uppercase', 'rows'=>'3', 'placeholder'=>'BREVE DESCRIPCION DEL TIPO DE ELECCION']) }}
</div>

<div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
	{{ Form::label('estado','Estado') }}
	{{ Form::select('estado', ['A'=>'HABILITADO','D'=>'DESHABILITADO'],null,['class'=>'form-control', 'placeholder' => 'SELECCIONE UN ESTADO']) }}
	@if ($errors->has('estado'))
        <span class="help-block">
            <strong>{{ $errors->first('estado') }}</strong>
        </span>
    @endif
</div>

<div class="form-group text-center">
	{{ Form::submit('GUARDAR', ['class'=>'btn btn-flat btn-primary']) }}
	<a href="{{ route('tipos.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>
</div>