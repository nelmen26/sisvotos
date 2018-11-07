<a href="{{ route('users.edit',$id) }}" class="btn btn-flat btn-info btn-sm ayuda" title="EDITAR"><i class="fa fa-edit"></i></a>
<a href="" data-target="#modal-delete-{{ $id }}" data-toggle="modal" class="btn btn-flat btn-danger btn-sm ayuda" title="ELIMINAR">
	<i class="fa fa-trash"></i>
</a>
@include('users.partials.modal')