@extends('layouts.master')

@section('title')
    Mesas
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-th"></i>
		MESAS
		<small>Listado de mesas registrados en el sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-th"></i> LISTA DE MESAS REGISTRADOS</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		<div>
			<a href="{{ route('mesas.create') }}" class="btn btn-flat btn-primary">
				<i class="fa fa-plus"></i> NUEVA MESA
			</a>
			<a href="{{ route('mesas.generar') }}" class="btn btn-flat btn-warning">
				<i class="fa fa-th"></i> GENERAR MESAS
			</a>
			<a href="{{ route('mesas.importar') }}" class="btn btn-flat btn-success">
				<i class="fa fa-download"></i> IMPORTAR MESAS DE RECINTOS
			</a>
		</div>
		<br>
        <table id="mesas" class="table table-bordered table-striped table-hover">
        	<thead>
        		<tr class="bg-black">
					<th>Mesa</th>
					<th>Recinto</th>
					{{-- <th width="15%">Votos habilitados</th> --}}
					{{-- <th width="5%">Estado</th> --}}
					<th width="8%">&nbsp;</th>
        		</tr>
        	</thead> 
        </table>
    </div>
	<!-- /.box-body -->
</div>

@endsection

@section('scripts')
<script>
  $(function () {
    $('#mesas').DataTable({
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar mesa..."
        },
        order: [[1, "asc" ],[0, "asc" ] ],
        processing: true,
        serverSide: true,
        ajax: '{!! route('mesas.apiMesas') !!}',
        columns: [
            { data: 'nombre'},
            { data: 'recinto.nombre'},
            // { data: 'total_votar'},
            // { data: 'estado'},
            { data: 'action', orderable: false, searchable: false},
        ],
    });
  })
</script>
@endsection