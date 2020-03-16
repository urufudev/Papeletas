


<!-- Modal -->
<div class="modal" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$id}}">
{{Form::Open(array('action' =>array('LeaveController@destroy',$id),'method'=>'delete'))}}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        <h3 class="modal-title" id="exampleModalLabel"><b>ELIMIAR</b></h3>
        
      </div>
      <div class="modal-body">
      <p>CONFIRME SI DESEA ELIMINAR</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary"> <b>CONFIRMAR</b> </button>
      </div>
    </div>
  </div>
  {{Form::Close()}}
</div>