@extends('layouts.master')

@section('title')
    Registro de Votos
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-check-circle"></i>
		REGISTRO
		<small>Registro de votos de los candidatos a </small> {{ $tipo->nombre }}
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
      <h3 class="box-title text-center"><i class="fa fa-building"></i> {{ $mesa->recinto->nombre }} <small class="label label-default">{{ $mesa->nombre }}</small></h3>
	</div>
	<div class="box-body">
    {!! Form::open(['route' => ['registros.storevotos', $mesa->id]]) !!}
    <div class="row">
      <?php $numero = 0 ?>
      {{ Form::hidden('tipo_id',$tipo->id) }}

			@foreach ($candidatos as $candidato)
			<div class="col-md-3">
				<!-- Profile Image -->
				<div class="box" style="border-color:{{ $candidato->color }}">
					<div class="box-body box-profile">
            {!!Form::hidden("candidatos[]",$candidato->id)!!}
            <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/candidatos/'.$candidato->fotografia ) }}" alt="{{ $candidato->nombre }}" style="border-color:{{ $candidato->color }}">
            <h3 class="profile-username text-center">{{ $candidato->nombre }}</h3>
            <p class="text-muted text-center">{{ $candidato->apellidos }}</p>
            <div class="form-group{{ $errors->has('votos.'. $numero) ? ' has-error' : '' }}">
                {{ Form::label('votos','Cantidad de Votos') }}
                {{ Form::number('votos[]',null,['class'=>'monto form-control','placeholder'=>'0','onkeyup'=>'sumar()', 'onChange'=>'validarSiNumero(this.value)']) }}
                @if ($errors->has('votos.'. $numero))
                    <span class="help-block">
                        <strong>{{ $errors->first('votos.'. $numero) }}</strong>
                    </span>
                @endif
            </div>
					</div>
					<!-- /.box-body -->
        </div>
        <?php $numero++ ?>
				<!-- /.box -->
      </div>
      @endforeach
      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="box" style="border-color:#8CC657">
          <div class="box-body box-profile">
            <div class="badge">
                <span id="spTotal"></span>
            </div>
            <h3 class="profile-username text-center"><strong>TOTAL</strong></h3>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <div class="text-center">
      {{ Form::submit('REGISTRAR',['class'=>'btn btn-success btn-flat']) }}
      <a href="{{ route('registros.mesas',$mesa->recinto->id) }}" class="btn btn-flat btn-warning">VOLVER ATRAS</a>
      <a href="{{ route('registros.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>
    </div>
    {!! Form::close() !!}
  </div>
	<!-- /.box-body -->
</div>

@endsection

@section('javascript')
    <script>
        function sumar() {
          var total = 0;
          $(".monto").each(function(){
            if (isNaN(parseFloat($(this).val()))) {
              total += 0;
            } else {
              total += parseFloat($(this).val());
            }
          });
          //alert(total);
          document.getElementById('spTotal').innerHTML = total;
        }

          function validarSiNumero(numero){
            if (!/^([0-9])*$/.test(numero))
              alert("El valor " + numero + " no es un número");
          }
    </script>

@endsection