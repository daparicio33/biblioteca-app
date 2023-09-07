<!-- Modal -->
<div class="modal fade" id="modal-delete-{{ $book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    {!! Form::open(['route'=>['dashboard.books.destroy',$book->id],'method'=>'delete']) !!}
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle"></i> Confirmar Eliminacion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Desea continuar?, recuerde que esta accion es irreversible
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle"></i> Cerrar</button>
          <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>