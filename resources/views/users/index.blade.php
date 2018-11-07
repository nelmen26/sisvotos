@extends('layouts.master')

@section('title')
    Usuarios
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-users"></i>
		USUARIOS
		<small>Listado de usuarios registrados en el sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-users"></i> LISTA DE USUARIOS REGISTRADOS</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		<a href="{{ route('users.create') }}" class="btn btn-flat btn-primary pull-right">
			<i class="fa fa-plus"></i> NUEVO USUARIO
		</a><br><br>
        <table id="usuarios" class="table table-bordered table-striped table-hover">
        	<thead>
        		<tr class="bg-black">
					<th>Nombre</th>
					<th>Usuario</th>
					<th>Rol</th>
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
    $('#usuarios').DataTable({
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar usuario..."
        },
        order: [[ 1, "asc" ]],
        processing: true,
        serverSide: true,
        ajax: '{!! route('users.apiUsers') !!}',
        columns: [
            { data: 'nombre'},
            { data: 'nickname'},
            { data: 'rol'},
            { data: 'action', orderable: false, searchable: false},
        ],
    });
    
  })
</script>
@endsection