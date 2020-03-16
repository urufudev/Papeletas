<!-- Modal -->

<div class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-show-{{$evaluation->id}}">
    
        {{Form::Open(array('action' =>array('EvaluationController@show',$evaluation->id),'method'=>'get'))}}
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header ">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
               
                <h1 class="modal-title text-center" >
                 PAPELETA N° {{$evaluation->id}}-{{$evaluation->created_at->format('Y')}}-GRA/GG-GRDS-DREA-OA-AP
                
                </h1>

              </div>
              <div class="modal-body">
                    <div class="row clearfix">
                    @if($evaluation->resp_status=='EN ESPERA')
                    <div class="alert alert-info">
                            
                            
                            EL ESTADO DE LA PAPELETA ES: <strong>{{$evaluation->resp_status}} </strong>  

                        </div>
                            
                
                    @elseif($evaluation->resp_status=='AUTORIZADO')
                    <div class="alert alert-success">
                            EL ESTADO DE LA PAPELETA ES: <strong>{{$evaluation->resp_status}}</strong> EL <strong>  {{$evaluation->updated_at->format('d/m/Y H:i')}}</strong> POR <strong>  {{$evaluation->resp_name}} </strong>
                        </div>
                    
                    
                    @elseif($evaluation->resp_status=='RECHAZADO')
                    <div class="alert alert-danger">
                        EL ESTADO DE LA PAPELETA ES: <strong>{{$evaluation->resp_status}}</strong> EL <strong>  {{$evaluation->updated_at->format('d/m/Y H:i')}}</strong> POR <strong>  {{$evaluation->resp_name}} </strong>
                    </div>
                    
                    @endif
                    </div>                   

                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                            <p class="text-left" style="font-size:15px; text-"><b>TRABAJADOR/A:</b> </p>
                                            <p class="text-left font-weight-normal">{{$evaluation->user->ap_paterno}} {{$evaluation->user->ap_materno}}, {{$evaluation->user->name}} </p>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                            <p class="text-left" style="font-size:15px; text-"><b>REGIMEN LABORAL: </b> </p>
                                            <p class="text-left font-weight-normal">{{$evaluation->user->regime}}</p>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                                <p class="text-left" style="font-size:15px; text-"> <b>DEPENDENCIA/A: </b> </p>
                                                <p class="text-left font-weight-normal">{{$evaluation->user->office->name}}</p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                    <p class="text-left" style="font-size:15px; text-"><b>TIPO DE PAPELETA:</b> </p>
                                                    <p class="text-left font-weight-normal">{{$evaluation->leavetype->name}}</p>
                                                
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                    <p class="text-left" style="font-size:15px; text-"><b>DESCRIPCION: </b> </p>
                                                    <p class="text-left font-weight-normal">{{$evaluation->description}}</p>
                                                </div>
                                        </div>
                                    </div>
                                </div>    


                                <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                        <p class="text-left" style="font-size:15px; text-"><b>F/H DE SALIDA:</b> </p>
                                                        <p class="text-left font-weight-normal">{{ date('d/m/Y H:i', strtotime($evaluation->fh_from)) }}</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                        <p class="text-left" style="font-size:15px; text-"><b>FECHA DE EMISIÓN: </b> </p>
                                                        <p class="text-left font-weight-normal">{{$evaluation->created_at->format('d/m/Y H:i')}}</p>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                            <p class="text-left" style="font-size:15px; text-"><b>F/H DE RETORNO:</b> </p>
                                                            <p class="text-left font-weight-normal">{{ date('d/m/Y H:i', strtotime($evaluation->fh_to)) }}</p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                            <p class="text-left" style="font-size:15px; text-"><b>FECHA DE AUTORIZACIÓN / RESPONSABLE: </b> </p>
                                                            @if($evaluation->resp_status!='EN ESPERA')  
                                                            <p class=" font-weight-normal">{{ $evaluation->resp_msg}}  </p>
                                                            <p class=" font-weight-normal">{{ date('d/m/Y H:i', strtotime($evaluation->resp_chdate)) }}  </p>
                                                            @else
                                                            <p class=" font-weight-normal">&nbsp;  </p>
                                                            
                                                            @endif
                                                            <p class=" font-weight-normal">{{$evaluation->resp_name}} </p>
                                                            
                                                        </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">

                                        
                                                @if($evaluation->resp_status =='AUTORIZADO')
                
                                                {!!QrCode::color(225,255,255 )->backgroundColor(43, 152, 43  )->size(200)->generate('LA PAPELETA N° '.$evaluation->id.' ES '.$evaluation->resp_status.' POR '.$evaluation->resp_name.' A LAS '.$evaluation->resp_chdate) !!}
                                               

                                                @elseif($evaluation->resp_status ==='RECHAZADO') 

                
                                                {!!QrCode::color(225,255,255 )->backgroundColor(251, 72, 58)->size(200)->generate('LA PAPELETA N° '.$evaluation->id.' ES '.$evaluation->resp_status.' POR '.$evaluation->resp_name.' A LAS '.$evaluation->resp_chdate) !!}
                                                
                                                @endif
                                        </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"> <b>CERRAR</b> </button>
                
              </div>
            </div>
          </div>
          {{Form::Close()}}
        </div>


{{-- @extends('layouts.app')

@section('content')

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-blue-grey">
                    <h3><b>DETALLE DE PAPELETA </b>
                    <a href="{{route('evaluations.index')}}" class="btn btn-primary pull-right">
                    
                    <b>VOLVER  </b> 
                    </a></h3>
                    

                    </div>
                
                    <div class="body">

                            @if($evaluation->resp_status=='EN ESPERA')
                            <div class="alert alert-info">
                                    EL ESTADO DE LA PAPELETA ES: <strong>{{$evaluation->resp_status}} </strong> EL <strong>  {{$evaluation->updated_at->format('d/m/Y H:i')}} </strong> POR <strong>  {{$evaluation->resp_name}} </strong> 
                                </div>
                                    
                        
                            @elseif($evaluation->resp_status=='AUTORIZADO')
                            <div class="alert alert-success">
                                    EL ESTADO DE LA PAPELETA ES: <strong>{{$evaluation->resp_status}} </strong> EL <strong>  {{$evaluation->updated_at->format('d/m/Y H:i')}}</strong> POR <strong>  {{$evaluation->resp_name}} </strong> 

                                    
                                </div>
                            
                            
                            @elseif($evaluation->resp_status=='RECHAZADO')
                            <div class="alert alert-danger">
                                EL ESTADO DE LA PAPELETA ES: <strong>{{$evaluation->resp_status}} </strong> EL <strong>  {{$evaluation->updated_at->format('d/m/Y H:i')}}</strong> POR <strong>  {{$evaluation->resp_name}} </strong> 

                                
                            </div>
                            
                            @endif

                            
                            <table class="table table-borderless ">
                                        <thead>
                                        
                                            <tr>
                                                <th width="auto" class="text-center"> 
                                                
                                                    <div class="badge badge-secondary text-wrap width-auto"  >
                                                        <h4 class="text-center" >PAPELETA N° {{$evaluation->id}}-{{$evaluation->created_at->format('Y')}}-GRA/GG-GRDS-DREA-OA-AP</h4> 
                                                    </div>
                                                </th>
                                        
                                                
                                            </tr>
                                        </thead>
                                    </table>
    
                                    <table class="table  table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col-6"  width="50%"  >  
    
                                                    <p class="text-left" style="font-size:15px; text-">TRABAJADOR/A: </p>
                                                    <p class="text-left font-weight-normal">{{$evaluation->user->ap_paterno}} {{$evaluation->user->ap_materno}}, {{$evaluation->user->name}} </p>
                                                
                                                </th>
                                                <th scope="col-6"  width="50%" >  
    
                                                    <p class="text-left" style="font-size:15px; text-">REGIMEN LABORAL: </p>
                                                    <p class="text-left font-weight-normal">{{$evaluation->user->regime}}</p>
                                                
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="col-6" colspan="2">  
    
                                                    <p class="text-left" style="font-size:15px; text-">DEPENDENCIA: </p>
                                                    <p class="text-left font-weight-normal">{{$evaluation->user->office->name}}</p>
                                                
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="col-6" >  
    
                                                    <p class="text-left"  style="font-size:15px; text-">TIPO DE PAPELETA: </p>
                                                    <p class="text-left font-weight-normal">{{$evaluation->leavetype->name}}</p>
                                                
                                                </th>
                                                <th scope="col-6" >  
    
                                                    <p class="text-left" style="font-size:15px; text-">DESCRIPCION: </p>
                                                    <p class="text-left font-weight-normal">{{$evaluation->description}}</p>
                                                
                                                </th>
                                            </tr>
                                            
                                            
                                            <tr>
                                                <th scope="col-6">  
    
                                                    <p class="text-right" style="font-size:15px;">F/H DE SALIDA: </p>
                                                    <p class="text-right font-weight-normal">{{ date('d/m/Y H:i', strtotime($evaluation->fh_from)) }}</p>
                                                    
    
                                                </th>
                                                <th scope="col-6">  
    
                                                <p class="text-center" style="font-size:15px;">FECHA DE EMISIÓN: </p>
                                                    <p class="text-center font-weight-normal">{{$evaluation->created_at->format('d/m/Y H:i')}}</p>
                                        
                                                </th>
                                                
                                            </tr>
                                            <tr>
                                                <th scope="col-6">  
    
                                                    <p class="text-right" style="font-size:15px;">F/H DE RETORNO: </p>
                                                    <p class="text-right font-weight-normal">{{ date('d/m/Y H:i', strtotime($evaluation->fh_to)) }} </p>
                                                    
                                                
    
                                                </th>
                                                <th scope="col-6">  
    
                                                <p class="text-center" style="font-size:15px;">FECHA DE AUTORIZACIÓN / RESPONASBLE: </p>
                                                    @if($evaluation->resp_status!='EN ESPERA')  
                                                    <p class="text-center font-weight-normal">{{ date('d/m/Y H:i', strtotime($evaluation->resp_chdate)) }}  </p>
                                                    @else
                                                    <p class="text-center font-weight-normal">&nbsp;  </p>
                                                    
                                                    @endif
                                                    <p class="text-center font-weight-normal">{{$evaluation->resp_name}} </p>
                                                    
                                                </th>
                                                    
                                            </tr>
                                            <tr>
                                                    <th scope="col-6" colspan="2">  
        
                                                        <p class="text-center" style="font-size:15px;">MENSAJE DE AUTORIZACIÓN: </p>
                                                        <p class="text-center font-weight-normal">{{$evaluation->resp_msg}}</p>
                                                    
                                                    </th>
                                                </tr>
    
    
                                        
                                            
                                        </thead>
                                    </table>
    
                    
                                <div class="text-center">
                                        @if($evaluation->resp_status!='EN ESPERA')

                                        {!!QrCode::size(300)->generate($evaluation->id.'|'.$evaluation->resp_name.'|'.$evaluation->resp_status.'|'.$evaluation->resp_chdate) !!}
                                        @endif
                                </div>
                                    
    
                      </div>
                </div>
            </div>
 

@endsection --}}