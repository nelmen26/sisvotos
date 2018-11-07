<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
            {{ Form::label('nombre', 'Nombre') }}
            {{ Form::text('nombre',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'NOMBRE COMPLETO']) }}
            @if ($errors->has('nombre'))
                <span class="help-block">
                    <strong>{{ $errors->first('nombre') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
            {{ Form::label('nickname', 'Usuario') }}
            {{ Form::text('nickname', null,['class'=> 'form-control', 'placeholder'=>'NOMBRE DE USUARIO']) }}
            @if ($errors->has('nickname'))
                <span class="help-block">
                    <strong>{{ $errors->first('nickname') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	{{ Form::label('password', 'Contraseña') }}
	{{ Form::password('password',['class'=> 'form-control', 'placeholder'=>'**********']) }}
	@if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
	{{ Form::label('rol','Rol') }}
	{{ Form::select('rol', ['admin'=>'Administrador','encargado'=>'Encargado'],null,['class'=>'form-control']) }}
	@if ($errors->has('rol'))
        <span class="help-block">
            <strong>{{ $errors->first('rol') }}</strong>
        </span>
    @endif
</div>

<div class="form-group text-center">
	{{ Form::submit('GUARDAR', ['class'=>'btn btn-flat btn-primary']) }}
	<a href="{{ route('users.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>
</div>