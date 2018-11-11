@extends('layouts.master')

@section('title')
    Recintos
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-building"></i>
		RECINTOS
		<small>Listado de recintos registrados en el sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-building"></i> LISTA DE RECINTOS REGISTRADOS</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		<div>
			<a href="{{ route('recintos.create') }}" class="btn btn-flat btn-primary">
				<i class="fa fa-plus"></i> NUEVO RECINTO
			</a>
			<a href="{{ route('recintos.importar') }}" class="btn btn-flat btn-success">
				<i class="fa fa-download"></i> IMPORTAR RECINTOS
			</a>
		</div>
		<br>
        <table id="recintos" class="table table-bordered table-striped table-hover">
        	<thead>
        		<tr class="bg-black">
					<th width="5%">#</th>
					<th>Nombre de Recinto</th>
					<th>Direccion</th>
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
    $('#recintos').DataTable({
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar recinto..."
        },
        order: [[ 0, "asc" ]],
        processing: true,
        serverSide: true,
        ajax: '{!! route('recintos.apiRecintos') !!}',
        columns: [
            { data: 'id'},
            { data: 'nombre'},
            { data: 'direccion'},
            // { data: 'estado'},
            { data: 'action', orderable: false, searchable: false},
        ],
    });
    
  })
</script>
@endsection