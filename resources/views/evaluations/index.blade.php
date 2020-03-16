 @extends('layouts.app')
@section('styles')

@endsection
@section('content')

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-blue-grey">
                    
                    <h3>
                    <b>LISTA DE PAPELETAS </b>
                    
                    <p>
                    {{auth()->user()->office->name}}
                    </p>
                    </h3>
                    
                    

                    </div>
                    
                    <div class="body  table-responsive ">
                        <div class="row">
                            @include('evaluations.partials.search',['leavetypes'=>$leavetypes])
                        </div>    
                        
                        <table data-order='[[ 0, "desc" ]]' {{-- id="dgwTabla" --}} class="table js-exportable">
                            <thead >
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width ="20%">EMPLEADO</th>
                                    <th width ="10%">TIPO DE PAPELETA</th>
                                    <th width ="25%">DESCRIPCIÓN</th>
                                    <th width ="10%">F/H SALIDA</th>
                                    <th width ="10%">F/H RETORNO</th>
                                    <th>ESTADO</th>
                                    <th text="text-right"> OPCIONES</th>
                                   
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                            
                                @forelse($evaluations as $evaluation)
                                <tr>
                                    <td>{{$evaluation->id}}</td>
                                    <td>{{$evaluation->user->ap_paterno}} {{$evaluation->user->ap_materno}}, {{$evaluation->user->name}}</td>
                                    <td>{{$evaluation->leavetype->name}}</td>
                                    <td>{{$evaluation->description}}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($evaluation->fh_from)) }}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($evaluation->fh_to)) }}</td>
                                    
                                    
                                    <td>
                                    @if($evaluation->resp_status=='EN ESPERA')
                                    
                                    <b style="color:blue;" data-toggle="tooltip" data-placement="top" title="LA PAPELETA ESTA EN ESPERA">{{$evaluation->resp_status}}</b>
                                    
                                    @elseif($evaluation->resp_status=='AUTORIZADO')
                                    <b style="color:green;" data-toggle="tooltip" data-placement="top" title="LA PAPELETA FUE AUTORIZADA">{{$evaluation->resp_status}}</b>
                                    @elseif($evaluation->resp_status=='RECHAZADO')
                                    <b style="color:red;" data-toggle="tooltip" data-placement="top" title="LA PAPELETA FUE RECHAZADA">{{$evaluation->resp_status}}</b>
                                    @endif

                                    </td>

                                    <td widht="30px">
                                        
                                        <div class="btn-group pull-right" role="group" aria-label="Basic example">
                                            
                                            
                                            
                                            @if($evaluation->resp_status=='EN ESPERA')
                                            <a href="{{route('evaluations.edit',$evaluation->id)}}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="EVALUAR">
                                                <i class="material-icons md-18">done_all</i>
                                            </a>
                                            @endif

                                            @can('evaluations.show')
                                            {{-- <a href="{{route('evaluations.show',$evaluation->id)}}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="VER">
                                                    <i class="material-icons md-28" >search</i>
                                                </a> --}}
                                                <a href="" data-target="#modal-show-{{$evaluation->id}}" data-toggle="modal" id="modal-show" class="btn btn-sm btn-info"  data-placement="top" title="VER">
                                                        <i class="material-icons md-28" >search</i>
                                                    </a>
                                                @include('evaluations.show')
                                            @endcan  
                                            
                                        </div>
                                        
                                        
                                        
                                       
                                    </td>
                                   
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" >
                                        <div class="alert alert-info" style="padding: 30px">
                                            <h3 class="align-center"><strong>NO TIENES HISTORIAL DE PAPELETAS EVALUADAS</strong></h3>
                                        
                                        </div>
                                    </td>
                                </tr>   
                                
                                @endforelse

                            </tbody>
                        </table>
                        
                        <div class="text-right">
                            {!!$evaluations->render()!!}
                        </div>
                        
                    
                    </div>
                </div>
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

 