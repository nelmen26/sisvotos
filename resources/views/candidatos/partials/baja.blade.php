<div class="modal modal-danger fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-baja-{{ $candidato->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Baja de un Candidato</h4>
        </div>
        {!! Form::open(['route' => ['candidatos.darbaja',$candidato->id], 'method' => 'GET']) !!}
        <div class="modal-body">
          <p>
            Desea dar de baja a Candidato {{ $candidato->nombre }}
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-outline">Confirmar</button>
        </div>
        {!! Form::close() !!}
      </div>    
    </div>
  </div>