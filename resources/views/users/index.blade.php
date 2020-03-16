@extends('layouts.app')

@section('content')

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <div class="card">
                <div class="header bg-blue-grey">
                <h3>
                    <b>LISTA DE EMPLEADOS </b>
                    <a href="{{route('offices.create')}}" class="btn btn-primary pull-right">
                    <b>CREAR </b> 
                    </a></h3>
            
                </div>
                
                <div class="body  table-responsive ">
                    <table data-order='[[ 0, "desc" ]]' id="dgwTabla" class="table js-exportable">
                    <thead >
                        <tr>
                            <th widht="5%">ID</th>
                            <th widht="15%">DNI</th>
                            <th widht="35%">NOMBRE</th>
                            
                            <th widht="35%">OFICINA</th>
                        
                            <th class="text-right" widht="10%">OPCIONES</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td widht="5%">{{$user->id}}</td>
                            <td widht="15%"> <b>{{$user->dni}}</b> </td>
                            <td widht="35%">{{$user->ap_paterno}} {{$user->ap_materno}}, {{$user->name}}</td>
                            <td widht="35%">{{$user->oficina}}</td>
                            
                            <td widht="3%">
                                
                                 <div class="btn-group pull-right" role="group" aria-label="Basic example">
                                            
                                    @can('users.show')
                                    <a href="{{route('users.show',$user->id)}}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="VER"> 
                                    <i class="material-icons md-28" >search</i>
                                    </a>
                                    @endcan
                                            
                                    @can('users.edit')
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="EDITAR"> 
                                    <i class="material-icons md-18">border_color</i></a>
                                    

                                    @endcan

                                    @can('users.destroy')
                                    <a href="" data-target="#modal-delete-{{$user->id}}"  data-toggle="modal" id="modal-delete" class="btn btn-sm btn-danger"  data-placement="top" title="ELIMINAR">
                                        <i class="material-icons">
                                        delete
                                        </i>
                                    </a>
                                        @include('users.modal')
                                    @endcan   
                                            
                                    </div>
           
                               
                            </td>


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
