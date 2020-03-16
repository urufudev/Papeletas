@extends('layouts.app')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
        <div class="header bg-blue-grey">
        
        <h3>
        <b>GENERAR REPORTE DE MIS PAPELETAS </b>
        
        </h3>

        

        </div>
    <form action="{{route ("reports.personal")}}" method="GET">
        {{-- {{ csrf_field() }} --}}
        <div class="body">
            <div class="form-group">
                <label for="f_from">FECHA DE INICIO (AAAA-MM-DD)</label>
                <div class="form-line">
                <input class="form-control" name="f_from" type="date" id="f_from">
                </div>  
            </div>
            <div class="form-group">
                <label for="f_to">FECHA DE FIN (AAAA-MM-DD)</label>
                <div class="form-line">
                <input class="form-control" name="f_to" type="date" id="f_to" >
                </div>  
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect"> <h4><b>GENERAR REPORTE</b></h4> </button>
        </div>
            
        </div>
    </form>
    </div>

    

</div>

@if ($leaves->count() > 0)
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
        <div class="header bg-blue-grey">
        
        <h4>
        <b>RESULTADOS </b>
        <a href="" class="btn bg-cyan pull-right">
            <b>IMPRIMIR </b> 
            <i class="material-icons">print</i>
            </a>
        </h4>
        </div>

        <div class="body">
            <div class="body table-responsive ">
                {{-- <div class="row">
                    @include('leaves.partials.search',['leavetypes'=>$leavetypes])
                </div>  --}}
                <table data-order='[[ 0, "desc" ]]' {{-- id="dgwTabla" --}} class="table table-responsive js-exportable">
                    <thead >
                        <tr>
                            <th width ="5%">ID</th>
                            <th>NOMBRE</th>
                            <th>OFICINA</th>
                            <th>TIPO DE PAPELETA</th>
                            <th  width ="25%" >DESCRIPCIÓN</th>
                            <th>F/H SALIDA</th>
                            <th>F/H RETORNO</th>
                            <th>ESTADO</th>
                            
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leaves as $leave)
                        <tr>
                            <td>{{$leave->id}}</td>
                            <td>{{$leave->user->fullname}}</td>
                            <td>{{$leave->user->office->name}}</td>
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
                            
                            
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            
        </div>
</div>

    
@endif


        
  
 
@endsection
