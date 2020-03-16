<div class="btn-group pull-right" role="group" aria-label="Basic example">

                                            
                                            

  {{--   @can('leaves.show')
   <a href="" data-target="#modal-show-{{$id}}" data-toggle="modal" id="modal-show" class="btn btn-sm btn-info"  data-placement="top" title="MOSTRAR">
    <i class="material-icons md-28" >search</i>
    </a>
    @include('leaves.show')
    @endcan
     --}}
    @can('leaves.pdf')
    @if($resp_status == 'AUTORIZADO')
        
        <a href="{{route('leaves.pdf',$id)}}" class="btn btn-sm btn-warning" target="_blank"  data-toggle="tooltip" data-placement="top" title="IMPRIMIR">
        <i class="material-icons md-28" >print</i>
        </a>
    @endif
    @endcan
   
    @can('leaves.edit')
    @if($resp_status == 'EN ESPERA')
        <a href="{{route('leaves.edit',$id)}}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="EDITAR">
        <i class="material-icons md-18">border_color</i>
        </a>
    @endif 
    @endcan

    @can('leaves.destroy')
        @if($resp_status == 'EN ESPERA')
        <a href="" data-target="#modal-delete-{{$id}}" data-toggle="modal" id="modal-delete" class="btn btn-sm btn-danger"  data-placement="top" title="ELIMINAR">
        <i class="material-icons">
        delete
        </i>
        </a>
        @include('leaves.modal')
        @endif 
    @endcan
    
</div>