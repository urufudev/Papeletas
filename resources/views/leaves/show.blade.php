
<!-- Modal -->

<div class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-show-{{$id}}">
    
        {{Form::Open(array('action' =>array('LeaveController@show',$id),'method'=>'get'))}}
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header ">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
               
                <h1 class="modal-title text-center" >
                 PAPELETA N° {{$id}}-{{$created_at_year_format}}-GRA/GG-GRDS-DREA-OA-AP
                
                </h1>

              </div>
              <div class="modal-body">
                    <div class="row clearfix">
                    @if($resp_status=='EN ESPERA')
                    <div class="alert alert-info">
                            
                            
                            EL ESTADO DE LA PAPELETA ES: <strong>{{$resp_status}} </strong>  

                        </div>
                            
                
                    @elseif($resp_status=='AUTORIZADO')
                    <div class="alert alert-success">
                            EL ESTADO DE LA PAPELETA ES: <strong>{{$resp_status}}</strong> EL <strong>  {{$updated_at_format}}</strong> POR <strong>  {{$resp_name}} </strong>
                        </div>
                    
                    
                    @elseif($resp_status=='RECHAZADO')
                    <div class="alert alert-danger">
                        EL ESTADO DE LA PAPELETA ES: <strong>{{$resp_status}}</strong> EL <strong>  {{$updated_at_format}}</strong> POR <strong>  {{$resp_name}} </strong>
                    </div>
                    
                    @endif
                    </div>
                    

                        {{-- <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                            <p class="text-left" style="font-size:15px; text-"><b>TRABAJADOR/A:</b> </p>
                                            <p class="text-left font-weight-normal">{{$user}} </p>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                            <p class="text-left" style="font-size:15px; text-"><b>REGIMEN LABORAL: </b> </p>
                                            <p class="text-left font-weight-normal">{{$user->regime}}</p>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                                <p class="text-left" style="font-size:15px; text-"> <b>DEPENDENCIA/A: </b> </p>
                                                <p class="text-left font-weight-normal">{{$user->office->name}}</p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                    <p class="text-left" style="font-size:15px; text-"><b>TIPO DE PAPELETA:</b> </p>
                                                    <p class="text-left font-weight-normal">{{$leavetype->name}}</p>
                                                
                                            </div>
                                        </div>
                                    </div>
         --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                    <p class="text-left" style="font-size:15px; text-"><b>DESCRIPCION: </b> </p>
                                                    <p class="text-left font-weight-normal">{{$description}}</p>
                                                </div>
                                        </div>
                                    </div>
                                </div>    


                                <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                        <p class="text-left" style="font-size:15px; text-"><b>F/H DE SALIDA:</b> </p>
                                                        <p class="text-left font-weight-normal">{{$fh_from_format}}</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                        <p class="text-left" style="font-size:15px; text-"><b>FECHA DE EMISIÓN: </b> </p>
                                                        <p class="text-left font-weight-normal">{{$created_at_format}}</p>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                            <p class="text-left" style="font-size:15px; text-"><b>F/H DE RETORNO:</b> </p>
                                                            <p class="text-left font-weight-normal">{{ $fh_to_format }}</p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                            <p class="text-left" style="font-size:15px; text-"><b>FECHA DE AUTORIZACIÓN / RESPONASBLE: </b> </p>
                                                            @if($resp_status!='EN ESPERA')  
                                                            <p class=" font-weight-normal">{{ $resp_msg}}  </p>
                                                            <p class=" font-weight-normal">{{$resp_chdate_format }}  </p>
                                                            @else
                                                            <p class=" font-weight-normal">&nbsp;  </p>
                                                            
                                                            @endif
                                                            <p class=" font-weight-normal">{{$resp_name}} </p>
                                                            
                                                        </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                                @if($resp_status!='EN ESPERA')
                
                                                {!!QrCode::size(200)->generate('LA PAPELETA N° '.$id.' ES '.$resp_status.' POR '.$resp_name.' A LAS '.$resp_chdate) !!}
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

