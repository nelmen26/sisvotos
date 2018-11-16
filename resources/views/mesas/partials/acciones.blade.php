@if($estado=='D')
	<a href="" data-target="#modal-alta-{{ $id }}" data-toggle="modal" class="btn btn-flat btn-success btn-sm ayuda" title="ALTA">
		<i class="fa fa-arrow-circle-o-up"></i>
	</a>
@else
	<a href="" data-target="#modal-baja-{{ $id }}" data-toggle="modal" class="btn btn-flat btn-danger btn-sm ayuda" title="BAJA">
		<i class="fa fa-arrow-circle-o-down"></i>
	</a>

@endif

<a href="{{ route('mesas.edit',$id) }}" class="btn btn-flat btn-info btn-sm ayuda" title="EDITAR"><i class="fa fa-edit"></i></a>
<a href="" data-target="#modal-delete-{{ $id }}" data-toggle="modal" class="btn btn-flat btn-danger btn-sm ayuda" title="ELIMINAR">
	<i class="fa fa-trash"></i>
</a>

@include('mesas.partials.modal')
@if($estado=='A')
@include('mesas.partials.baja')
@else
@include('mesas.partials.alta')
@endif