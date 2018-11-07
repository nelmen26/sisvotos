@extends('layouts.auth')

@section('title')
    Inicio de Sesion
@endsection

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/home') }}">
            <b>{{ config('app.name', 'Laravel') }}</b>
        </a>
    </div><!-- /.login-logo -->

    <div class="login-box-body">
        <p class="login-box-msg"> Autentificacion al Sistema </p>
        <form action="{{ url('/login') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group has-feedback{{ $errors->has('nickname') ? ' has-error' : '' }}">
                <input type="text" class="form-control" placeholder="Usuario" name="nickname" value="{{ old('nickname') }}"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('nickname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nickname') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Contrasena" name="password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> Recuerdame
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div><!-- /.col -->
            </div>
        </form>
    </div><!-- /.login-box-body -->
    <div class="box-footer">
        <span class="text-center help-block" style="font-size: 0.75em">Gobierno Autonomo Municipal de Sucre - <strong>{{ Carbon\Carbon::now()->year }}</strong></span>
    </div>
</div><!-- /.login-box -->
@endsection
