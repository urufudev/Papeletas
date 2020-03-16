@extends('layouts.app')
@section('styles')

@endsection
@section('content')

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-blue-grey">
                    
                    <h3>
                    <b>LISTA DE MIS PAPELETAS </b>
                    
                    @can('leaves.create')
                    <a href="{{route('leaves.create')}}" class="btn btn-primary pull-right">
                    <b>CREAR </b> 
                    </a>
                    @endcan
                    </h3>

                    

                    </div>
                
                    <div class="body table-responsive ">
                        {{-- <div class="row">
                            @include('leaves.partials.search',['leavetypes'=>$leavetypes])
                        </div>  --}}
                        <table data-order='[[ 0, "desc" ]]' id="dgwTabla" class="table table-responsive js-exportable" style="width:100%">
                            <thead >
                                <tr>
                                    <th width ="5%">ID</th>
                                    <th>TIPO DE PAPELETA</th>
                                    <th  width ="25%" >DESCRIPCIÓN</th>
                                    <th>F/H SALIDA</th>
                                    <th>F/H RETORNO</th>
                                    <th>ESTADO</th>
                                    <th class="text-right"> OPCIONES</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                               {{--  @foreach($leaves as $leave)
                                <tr>
                                    <td>{{$leave->id}}</td>
                                    <td>{{$leave->leavetype->name}}</td>
                                    <td>{{$leave->description}}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($leave->fh_from)) }}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($leave->fh_to)) }}</td>
                                    
                                    <td>
                                    @if($leave->resp_status=='EN ESPERA')
                                    
                                    <b style="color:blue;">{{$leave->resp_status}}</b>
                                    
                                    @elseif($leave->resp_status=='AUTORIZADO')
                                    <b style="color:green;">{{$leave->resp_status}}</b>
                                    
                                    @elseif($leave->resp_status=='RECHAZADO')
                                    <b style="color:red;">{{$leave->resp_status}}</b>
                                    @endif

                                    </td>
                                    
                                    <td>
                                        
                                        <div class="btn-group pull-right" role="group" aria-label="Basic example">

                                            
                                            

                                            @can('leaves.show')
                                           <a href="" data-target="#modal-show-{{$leave->id}}" data-toggle="modal" id="modal-show" class="btn btn-sm btn-info"  data-placement="top" title="MOSTRAR">
                                            <i class="material-icons md-28" >search</i>
                                            </a>
                                            @include('leaves.show')
                                            @endcan
                                            @can('leaves.pdf')
                                            @if($leave->resp_status == 'AUTORIZADO')
                                                
                                                <a href="{{route('leaves.pdf',$leave->id)}}" class="btn btn-sm btn-warning" target="_blank"  data-toggle="tooltip" data-placement="top" title="IMPRIMIR">
                                                <i class="material-icons md-28" >print</i>
                                                </a>
                                            @endif
                                            @endcan
                                           
                                            @can('leaves.edit')
                                            @if($leave->resp_status == 'EN ESPERA')
                                                <a href="{{route('leaves.edit',$leave->id)}}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="EDITAR">
                                                <i class="material-icons md-18">border_color</i>
                                                </a>
                                            @endif 
                                            @endcan

                                            @can('leaves.destroy')
                                                @if($leave->resp_status == 'EN ESPERA')
                                                <a href="" data-target="#modal-delete-{{$leave->id}}" data-toggle="modal" id="modal-delete" class="btn btn-sm btn-danger"  data-placement="top" title="ELIMINAR">
                                                <i class="material-icons">
                                                delete
                                                </i>
                                                </a>
                                                @include('leaves.modal')
                                                @endif 
                                            @endcan
                                            
                                        
                                            
                                        </div>
                                   
                                    </td>
                                </tr>
                                
                                @endforeach --}}
                            </tbody>
                        </table>
                        <div class="text-right">
                                {!!$leaves->links()!!}
                            </div>
                    </div>
                </div>
            </div>


    @section('scripts')
    {{-- <script src="{{asset('plugins/jquery-datatable/fnReloadAjax.js')}}"></script>    --}}
 <script>
 
    $(document).ready(function(){
        

        $('[data-toggle="tooltip"]').tooltip();
        $('#modal-delete').tooltip();
    
        var table= $('#dgwTabla').DataTable({
        "serverSide":false,
        "ajax":"{{url('api/leaves')}}",
        "columns": [
            {data: 'id'},
            {data: 'leavetype.name'},
            {data:'description'},
            {data:'fh_from'},
            {data:'fh_to'},
            {data:'status_c'},
            {data:'btn'}

        ],
        language: {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "BUSCAR:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
             
        ]
    });

    $.fn.dataTable.ext.errMode = 'throw';
    /* setInterval( function () {
    
    table.ajax.reload();
    }, 5000 ); */
    setInterval (table.ajax.reload, 15000);
    /* console.log('actualizado',table); */
    
    });
</script>





@endsection


@endsection

