<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
    {{ Form::label('nombre', 'Nombre') }}
    {{ Form::text('nombre',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'NOMBRE DEL RECINTO']) }}
    @if ($errors->has('nombre'))
        <span class="help-block">
            <strong>{{ $errors->first('nombre') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{ Form::label('direccion', 'Direccion') }}
    {{ Form::text('direccion',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'DIRECCION DEL RECINTO']) }}
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
	<a href="{{ route('recintos.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>
</div>