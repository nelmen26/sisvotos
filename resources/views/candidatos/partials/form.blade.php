<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
            {{ Form::label('nombre', 'Nombre') }}
            {{ Form::text('nombre',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'NOMBRE DEL CANDIDATO']) }}
            @if ($errors->has('nombre'))
                <span class="help-block">
                    <strong>{{ $errors->first('nombre') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
            {{ Form::label('apellidos', 'Apellidos') }}
            {{ Form::text('apellidos',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'APELLIDOS DEL CANDIDATO']) }}
            @if ($errors->has('apellidos'))
                <span class="help-block">
                    <strong>{{ $errors->first('apellidos') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('tipo_id') ? ' has-error' : '' }}">
            {{ Form::label('tipo_id','Cargo a Eleccion') }}
            {{ Form::select('tipo_id', $tipos, null,['class'=>'form-control', 'placeholder' => 'SELECCIONE UN CARGO A ELECCION']) }}
            @if ($errors->has('tipo_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('tipo_id') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
            {{ Form::label('color', 'Color del Partido') }}
            <div class="input-group mi-colorpicker">
                {{ Form::text('color',null,['class'=> 'form-control', 'placeholder'=>'#000000']) }}
                <div class="input-group-addon">
                    <i></i>
                </div>
            </div>
            
            @if ($errors->has('color'))
                <span class="help-block">
                    <strong>{{ $errors->first('color') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
            {{ Form::label('foto', 'Fotografia') }}
            <input id="foto" name="foto" type="file">
            <p class="help-block">Suba una fotografia del candidato.</p>
            @if ($errors->has('foto'))
                <span class="help-block">
                    <strong>{{ $errors->first('foto') }}</strong>
                </span>
            @endif
        </div>
    </div>
    {{-- <div class="col-md-6">
        <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
            {{ Form::label('estado','Estado') }}
            {{ Form::select('estado', ['A'=>'HABILITADO','D'=>'DESHABILITADO'],null,['class'=>'form-control', 'placeholder' => 'SELECCIONE UN ESTADO']) }}
            @if ($errors->has('estado'))
                <span class="help-block">
                    <strong>{{ $errors->first('estado') }}</strong>
                </span>
            @endif
        </div>
    </div> --}}
</div>

<div class="form-group text-center">
	{{ Form::submit('GUARDAR', ['class'=>'btn btn-flat btn-primary']) }}
	<a href="{{ route('candidatos.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>
</div>

@section('css')
 <!-- Bootstrap Color Picker -->
 <link rel="stylesheet" href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
@endsection
@section('scripts')
<!-- bootstrap color picker -->
<script src="{{ asset ('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script>
    $(function(){
        $('.mi-colorpicker').colorpicker()
    })
</script>
@endsection