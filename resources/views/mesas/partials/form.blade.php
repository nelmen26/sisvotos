<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
    {{ Form::label('nombre', 'Nombre') }}
    {{ Form::text('nombre',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'NOMBRE DEL RECINTO']) }}
    @if ($errors->has('nombre'))
        <span class="help-block">
            <strong>{{ $errors->first('nombre') }}</strong>
        </span>
    @endif
</div>

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
        <div class="form-group{{ $errors->has('total_votar') ? ' has-error' : '' }}">
            {{ Form::label('total_votar', 'Votos Habilitados') }}
            {{ Form::number('total_votar',null,['class'=> 'form-control', 'placeholder'=>'0']) }}
            @if ($errors->has('total_votar'))
                <span class="help-block">
                    <strong>{{ $errors->first('total_votar') }}</strong>
                </span>
            @endif
        </div>
    </div>
    {{-- <div class="col-md-6">
        <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
            {{ Form::label('estado','Estado') }}
            {{ Form::select('estado', ['A'=>'ABIERTO','D'=>'CERRADO'],null,['class'=>'form-control', 'placeholder' => 'SELECCIONE UN ESTADO']) }}
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
	<a href="{{ route('mesas.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>
</div>

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