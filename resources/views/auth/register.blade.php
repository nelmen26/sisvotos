@extends('layouts.auth')

@section('title')
    Registro de Cuenta
@endsection

@section('content')
<div class="register-box">
  <div class="register-logo">
        <a href="{{ url('/home') }}">
            <b>{{ config('app.name', 'Laravel') }}</b>
        </a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Registrar nueva cuenta</p>

    <form  method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
      <div class="form-group has-feedback{{ $errors->has('nombre') ? ' has-error' : '' }}">
        <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @if ($errors->has('nombre'))
            <span class="help-block">
                <strong>{{ $errors->first('nombre') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback{{ $errors->has('nickname') ? ' has-error' : '' }}">
        <input type="text" name="nickname" class="form-control" placeholder="Usuario">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @if ($errors->has('nickname'))
            <span class="help-block">
                <strong>{{ $errors->first('nickname') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" name="password" class="form-control" placeholder="Contraseña">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input name="password_confirmation" type="password" class="form-control" placeholder="Confirmar Password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-7">
          <div class="form-group has-feedback{{ $errors->has('clave') ? ' has-error' : '' }}">
            <input name ="clave" type="password" class="form-control" placeholder="Clave">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('clave'))
            <span class="help-block">
                <strong>{{ $errors->first('clave') }}</strong>
            </span>
        @endif
         </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <div class="text-center">
        <a href="{{ route('login') }}">Ya tengo cuenta</a>
    </div>
  </div>
  <!-- /.form-box -->
  <div class="box-footer">
        <span class="text-center help-block" style="font-size: 0.75em">CODEWEB - <strong>{{ Carbon\Carbon::now()->year }}</strong></span>
    </div>
</div>
<!-- /.register-box -->

@endsection
