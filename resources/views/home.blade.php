@extends('layouts.app')

@section('content')
<div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="info-box hover-zoom-effect">
                <div class="icon bg-indigo">
                    <i class="material-icons">collections_bookmark</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL DE MIS PAPELETAS</div>
                    <div class="number count-to" data-from="0" data-to="{{{Auth::user()->leaves->where('status','ACTIVO')->count()}}}" data-speed="1" data-fresh-interval="20">0</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="info-box bg-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">done_all</i>
                </div>
                <div class="content">
                    <div class="text">MIS PAPELETAS AUTORIZADAS</div>
                <div class="number count-to" data-from="0" data-to="{{$leavesaut->count()}}" data-speed="1" data-fresh-interval="20">0</div>
                </div>
            </div>
        </div>
       
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="info-box bg-red hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">close</i>
                </div>
                <div class="content">
                    <div class="text">MIS PAPELETAS RECHAZADAS</div>
                    <div class="number count-to" data-from="0" data-to="{{$leavesrec->count()}}" data-speed="1" data-fresh-interval="20">0</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">alarm</i>
                    </div>
                    <div class="content">
                        <div class="text">MIS PAPELETAS EN ESPERA</div>
                        <div class="number count-to" data-from="0" data-to="{{$leavespen->count()}}" data-speed="1" data-fresh-interval="20">0</div>
                    </div>
                </div>
            </div>
</div>

<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                   <b>DESCRIPCIÓN DE TIPOS DE PAPELETA</b> 
                    <small>Descripción de cada tipo de papeleta que se encuentra disponible.</small>
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                        <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                            {{-- <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingOne_1">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1">
                                            xd
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                        non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                        single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                        helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                        Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                                        raw denim aesthetic synth nesciunt you probably haven't heard of them
                                        accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div> --}}
                            @foreach($leavetypes as $leavetype)
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingTwo_{{$leavetype->id}}">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseTwo_{{$leavetype->id}}" aria-expanded="false" aria-controls="collapseTwo_{{$leavetype->id}}">
                                            <b>{{$leavetype->name}}</b>
                                            <i class="material-icons" >keyboard_arrow_down</i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo_{{$leavetype->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_{{$leavetype->id}}">
                                    <div class="panel-body">
                                        {{$leavetype->body}} 
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                    <b>RECORD DE PAPELETAS DEL PRESENTE MES ({{Carbon\Carbon::now()->formatLocalized('%B')}})</b>
                        <small>Relación de personas con mayor cantidad de papeletas por diversos motivos en el mes actual.</small>
                    </h2>
                </div>
                <div class="body">
                    <ul class="list-group">
                        @foreach($mostleaves as $mostleave)
                    <li class="list-group-item"> <b>{{$mostleave->ap_paterno .' '.$mostleave->ap_materno.', '.$mostleave->name}}</b>   <span class="badge bg-blue">{{$mostleave->mostleaves}}</span></li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
        </div>
</div>    





{{-- <div class="row clearfix">
        <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">OFICINA</div>
    
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                    <div class="card">
                                            <div class="body bg-teal">
                                                <div class="font-bold m-b--35">ANSWERED TICKETS</div>
                                                <ul class="dashboard-stat-list">
                                                    <li>
                                                        TODAY
                                                        <span class="pull-right"><b>12</b> <small>TICKETS</small></span>
                                                    </li>
                                                    <li>
                                                        YESTERDAY
                                                        <span class="pull-right"><b>15</b> <small>TICKETS</small></span>
                                                    </li>
                                                    <li>
                                                        LAST WEEK
                                                        <span class="pull-right"><b>90</b> <small>TICKETS</small></span>
                                                    </li>
                                                    <li>
                                                        LAST MONTH
                                                        <span class="pull-right"><b>342</b> <small>TICKETS</small></span>
                                                    </li>
                                                    <li>
                                                        LAST YEAR
                                                        <span class="pull-right"><b>4 225</b> <small>TICKETS</small></span>
                                                    </li>
                                                    <li>
                                                        ALL
                                                        <span class="pull-right"><b>8 752</b> <small>TICKETS</small></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                            </div>
                        </div>
                            
                    </div>
                </div>
            </div>
</div> --}}

        
        
  
 
@endsection
