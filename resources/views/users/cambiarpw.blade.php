
<!-- Modal -->
<div class="modal" aria-hidden="true" role="dialog" tabindex="-1" id="modal-cambiarpw-{{$user->id}}">
{{Form::Open(array('action' =>array('UserController@cambiarpw',$user->id),'method'=>'post'))}}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><b>CAMBIAR CONTRASEÑA</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">CONTRASEÑA</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary"> <b>CONFIRMAR</b> </button>
      </div>
    </div>
  </div>
  {{Form::Close()}}
</div>