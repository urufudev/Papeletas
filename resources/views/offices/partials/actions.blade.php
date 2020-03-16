<a href="{{route('offices.roledit',$office->id)}}" class="btn btn-sm bg-blue-grey"  data-toggle="tooltip" data-placement="top" title="ROLES DE EMPLEADO">
    <i class="material-icons md-28" >control_camera</i>
</a>
<a href="{{route('offices.show',$office->id)}}" class="btn btn-sm btn-info"  data-toggle="tooltip" data-placement="top" title="VER">
    <i class="material-icons md-28" >search</i>
</a>

<a href="{{route('offices.edit',$office->id)}}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="EDITAR">
    <i class="material-icons md-18">border_color</i>
</a>

<a href="" data-target="#modal-delete-{{$office->id}}" data-toggle="modal" id="modal-delete" class="btn btn-sm btn-danger"  data-placement="top" title="ELIMINAR">
    <i class="material-icons">delete</i>
</a>