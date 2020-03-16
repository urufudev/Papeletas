@extends('layouts.app')
@section('styles')

@endsection
@section('content')

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-blue-grey">
                    
                    <h3>
                    <b>LISTA DE TIPOS DE PAPELETAS </b>
                    @can('leavetypes.create')
                    <a href="{{route('leavetypes.create')}}" class="btn btn-primary pull-right">
                    <b>CREAR </b> 
                    </a>
                    @endcan
                    </h3>
                    

                    </div>
                
                    <div class="body table-responsive ">
                        <table data-order='[[ 0, "desc" ]]' id="dgwTabla" class="table js-exportable">
                            <thead >
                                <tr>
                                    <th width ="5%">ID</th>
                                    <th>NOMBRE</th>
                                    <th class="text-right" >OPCIONES</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($leavetypes as $leavetype)
                                <tr>
                                    <td>{{$leavetype->id}}</td>
                                    <td>{{$leavetype->name}}</td>
                                    <td >
                                        <div class="btn-group pull-right" role="group" aria-label="Basic example">
                                            
                                            <a href="{{route('leavetypes.show',$leavetype->id)}}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="VER">
                                                <i class="material-icons md-28" >search</i>
                                            </a>
                                            
                                            <a href="{{route('leavetypes.edit',$leavetype->id)}}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="EDITAR">
                                                <i class="material-icons md-18">border_color</i>
                                            </a>

                                            <a href="" data-target="#modal-delete-{{$leavetype->id}}" data-toggle="modal" id="modal-delete" class="btn btn-sm btn-danger"  data-placement="top" title="ELIMINAR">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        
                                            
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                      
                                        @include('leavetypes.modal')
                                    
                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                    
                    </div>
                </div>
            </div>


    @section('scripts')
 <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $('#modal-delete').tooltip();
        $('#dgwTabla').DataTable({
        
        language: {
                            "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
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
             'excel', 'pdf', 'print'
        ]
    });
    });
</script>





@endsection


@endsection

