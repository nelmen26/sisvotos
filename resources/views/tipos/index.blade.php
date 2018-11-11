@extends('layouts.master')

@section('title')
    Tipos de Eleccion
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-list"></i>
		TIPOS DE ELECCION
		<small>Listado de tipos de elecciones registrados en el sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-list"></i> LISTA DE TIPOS DE ELECCIONES REGISTRADOS</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		<a href="{{ route('tipos.create') }}" class="btn btn-flat btn-primary">
			<i class="fa fa-plus"></i> NUEVO TIPO DE ELECCIONES
		</a>
		<br><br>
        <table id="tipos" class="table table-bordered table-striped table-hover table-responsive">
        	<thead>
        		<tr class="bg-black">
					<th width="5%">#</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					{{-- <th width="5%">Estado</th> --}}
					<th width="8%">&nbsp;</th>
        		</tr>
        	</thead> 
		</table>
		{{-- </div> --}}
    </div>
	<!-- /.box-body -->
</div>

@endsection

@section('scripts')
<script>
  $(function () {
    $('#tipos').DataTable({
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar tipo de elecciones..."
        },
        order: [[ 0, "asc" ]],
        processing: true,
        serverSide: true,
        ajax: '{!! route('tipos.apiTipos') !!}',
        columns: [
            { data: 'id'},
            { data: 'nombre'},
            { data: 'descripcion'},
            // { data: 'estado'},
            { data: 'action', orderable: false, searchable: false},
        ],
    });
    
  })
</script>
@endsection