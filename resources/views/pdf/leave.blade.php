<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PAPELETA DE SALIDA</title>
    <link href="{{public_path().'/css/pdf.css'}}" rel="stylesheet"> 
</head>
<body>
    
    <table class="table table-borderless">
        <thead>
            <tr>
            <th scope="col-12"><img src="{{public_path().'/image/header.png'}}" height="135"></th>
            </tr>
        </thead>
    </table>

    <table class="table table-borderless table-sm">
        <thead class="thead-dark">
        
            <tr>
                <th scope="col-10" width="95%"> 
                 
                    
                        <p class="text-center" style="font-size:15px;margin-bottom: 0px;">PAPELETA N° {{$leave->id}}-{{$leave->created_at->format('Y')}}-GRA/GG-GRDS-DREA-OA-AP</p> 
                        <p class="text-center" style="font-size:15px; margin-bottom: 0px;" >AUTORIZACIÓN DE PERMISOS, COMISIONES Y OTROS (JUSTIFICACIÓN DE INASISTENCIA NO MAYOR A UN (01) DÍA)  </p> 
                   
                </th>
        
                
            </tr>
        </thead>
    </table>

    <table class="table  table-bordered">
        <thead>
            <tr>
                <th scope="col-6" >  

                    <p class="text-left" style="font-size:15px; text-">TRABAJADOR/A: </p>
                    <p class="text-left font-weight-normal">{{$leave->user->ap_paterno}} {{$leave->user->ap_materno}}, {{$leave->user->name}} </p>
                   
                </th>
                <th scope="col-6"  >  

                    <p class="text-left" style="font-size:15px; text-">REGIMEN LABORAL: </p>
                    <p class="text-left font-weight-normal">{{$leave->user->regime}}</p>
                   
                </th>
            </tr>
            <tr>
                <th scope="col-6" colspan="2">  

                    <p class="text-left" style="font-size:15px; text-">DEPENDENCIA: </p>
                    <p class="text-left font-weight-normal">{{$leave->user->office->name}}</p>
                   
                </th>
            </tr>
            <tr>
                <th scope="col-6"  width="40%" >  

                    <p class="text-left"  style="font-size:15px; text-">TIPO DE PAPELETA: </p>
                    <p class="text-left font-weight-normal">{{$leave->leavetype->name}}</p>
                   
                </th>
                <th scope="col-6" >  

                    <p class="text-left" style="font-size:15px; text-">DESCRIPCION: </p>
                    <p class="text-left font-weight-normal">{{$leave->description}}</p>
                   
                </th>
            </tr>
            
            
            <tr>
                <th scope="col-6">  

                    <p class="text-right" style="font-size:15px;">F/H DE SALIDA: </p>
                    <p class="text-right font-weight-normal">{{ date('d/m/Y H:i', strtotime($leave->fh_from)) }}</p>
                    

                </th>
                <th scope="col-6">  

                <p class="text-center" style="font-size:15px;">FECHA DE EMISIÓN: </p>
                    <p class="text-center font-weight-normal">{{$leave->created_at->format('d/m/Y H:i')}}</p>
        
                </th>
                
            </tr>
            <tr>
                <th scope="col-6">  

                    <p class="text-right" style="font-size:15px;">F/H DE RETORNO: </p>
                    <p class="text-right font-weight-normal">{{ date('d/m/Y H:i', strtotime($leave->fh_to)) }} </p>
                    
                   

                </th>
                <th scope="col-6">  

                <p class="text-center" style="font-size:15px;">FECHA DE AUTORIZACIÓN / RESPONSABLE: </p>
                    <p class="text-center font-weight-normal">{{ date('d/m/Y H:i', strtotime($leave->resp_chdate)) }}  </p>
                    <p class="text-center font-weight-normal">{{$leave->resp_name}} </p>
                
                </th>
                    
            </tr>


           
            
        </thead>
    </table>

    
    <table class="table table-borderless">
        <thead>
        <tr>
                <th scope="col-6" height="140" width="50%" class="text-center">  

                <img style="border:1px solid black;margin:0"  src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(170)->generate('LA PAPELETA N° '.$leave->id.' ES '.$leave->resp_status.' POR '.$leave->resp_name.' A LAS '.$leave->resp_chdate)) }} ">
                    </th>
                <th scope="col-6" height="140">  

                <p class="text-center" style="font-size:15px; border-top:1px solid black;">FIRMA DEL/LA TRABAJADOR/A </p>
        
                </th>

            </tr>
        
        </thead>
    
    </table>
  

   {{--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  --}}


    @if($leave->leavetype->name == 'COMISIÓN DE SERVICIOS')
    <style>
            .verticalText {

                word-wrap: break-word;
                width:8px;
           /*  writing-mode: vertical-lr;
            transform: rotate(90deg); */
            }
            .tablafirma{
                font-size: 9px;
 
            }
            .tablafirma p{
                margin-bottom: 0px;
            }
            .tablafirma img{
                margin-bottom: 0px;
            }
            </style>                                  
    <table class="table table-borderless">
        <thead>
            <tr>
            <th scope="col-12"><img src="{{public_path().'/image/header.png'}}" height="135"></th>
            </tr>
        </thead>
    </table>
    <table class="table table-sm  tablafirma" >
        <thead class="thead-dark">
        
            <tr >
                <th scope="col-10" width="95%"  height="1px"> 
                 
                    
                        <p class="text-center" style="font-size:12px; margin-bottom: 0px;">PAPELETA N° {{$leave->id}}-{{$leave->created_at->format('Y')}}-GRA/GG-GRDS-DREA-OA-AP</p> 
                        
                        <p class="text-center" style="font-size:12px; margin-bottom: 0px;">CONSTANCIA DE COMISIÓN DE SERVICIO, SUPERVISIÓN, MONITOREO, ETC               </p> 
                    
                </th>
        
                
            </tr>
        </thead>
    </table>

    <table class="table table-sm  table-bordered  ">
        <thead>
            <tr>
                <th scope="col-6"  colspan="2" >  

                    <p class="text-left" style="font-size:15px;"> <b>APELLIDOS Y NOMBRES DEL COMISIONADO/A: </b>  </p>
                    <p class="text-left font-weight-normal" style="font-size:15px;">{{$leave->user->full_name}}</p>
                   
                </th>
                
            </tr>
            
            <tr>
                <th scope="col-6"   width="50%" >
                   <table class=" table  table-bordered table-sm tablafirma"   >
                        <thead>
                            <tr>
                                <th    width="8px" >
                                        <p class="verticalText">	</p> 
                                </th>
                                <th  width="75px">
                                    
                                </th>
                                <th class="text-center h-auto" >
                                <p style="font-size:8px; ">SELLO DE LA INSTITUCION</p> 
                                </th>
                                
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                    <th    width="8px"  >
                                            <p class="verticalText" >LUGAR	</p> 
                                    </th>
                                    <th  width="75px" >
                                    
                                        </th>
                                
                                <td rowspan="3"></td>
                            </tr>
                            <tr>
                                
                                <td height="1"> 
                                        <p class="verticalText">FECHA	</p>  

                                </td>
                                <td> </td>
                                
                            </tr>
                            <tr>
                                
                                <td> 
                                        <p class="verticalText">FIRMA	</p>  
                                </td>
                                <td> </td>
                                
                            </tr>
                        </tbody>
                   </table>
                </th>

                <th scope="col-6"   width="50%">
                        <table class=" table  table-bordered table-sm tablafirma"   >
                                <thead>
                                    <tr>
                                        <th    width="8px" >
                                                <p class="verticalText">	</p> 
                                        </th>
                                        <th  width="75px">
                                            
                                        </th>
                                        <th class="text-center h-auto" >
                                        <p style="font-size:8px; ">SELLO DE LA INSTITUCION</p> 
                                        </th>
                                        
                                    </tr>
        
                                </thead>
                                <tbody>
                                    <tr>
                                            <th    width="8px"  >
                                                    <p class="verticalText" >LUGAR	</p> 
                                            </th>
                                            <th  width="75px" >
                                            
                                                </th>
                                        
                                        <td rowspan="3"></td>
                                    </tr>
                                    <tr>
                                        
                                        <td height="1"> 
                                                <p class="verticalText">FECHA	</p>  
        
                                        </td>
                                        <td> </td>
                                        
                                    </tr>
                                    <tr>
                                        
                                        <td> 
                                                <p class="verticalText">FIRMA	</p>  
                                        </td>
                                        <td> </td>
                                        
                                    </tr>
                                </tbody>
                           </table>
                </th>

            </tr>
            <tr>
                <th scope="col-6"   width="50%" >
                   <table class=" table  table-bordered table-sm tablafirma"   >
                        <thead>
                            <tr>
                                <th    width="8px" >
                                        <p class="verticalText">	</p> 
                                </th>
                                <th  width="75px">
                                    
                                </th>
                                <th class="text-center h-auto" >
                                <p style="font-size:8px; ">SELLO DE LA INSTITUCION</p> 
                                </th>
                                
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                    <th    width="8px"  >
                                            <p class="verticalText" >LUGAR	</p> 
                                    </th>
                                    <th  width="75px" >
                                    
                                        </th>
                                
                                <td rowspan="3"></td>
                            </tr>
                            <tr>
                                
                                <td height="1"> 
                                        <p class="verticalText">FECHA	</p>  

                                </td>
                                <td> </td>
                                
                            </tr>
                            <tr>
                                
                                <td> 
                                        <p class="verticalText">FIRMA	</p>  
                                </td>
                                <td> </td>
                                
                            </tr>
                        </tbody>
                   </table>
                </th>

                <th scope="col-6"   width="50%">
                        <table class=" table  table-bordered table-sm tablafirma"   >
                                <thead>
                                    <tr>
                                        <th    width="8px" >
                                                <p class="verticalText">	</p> 
                                        </th>
                                        <th  width="75px">
                                            
                                        </th>
                                        <th class="text-center h-auto" >
                                        <p style="font-size:8px; ">SELLO DE LA INSTITUCION</p> 
                                        </th>
                                        
                                    </tr>
        
                                </thead>
                                <tbody>
                                    <tr>
                                            <th    width="8px"  >
                                                    <p class="verticalText" >LUGAR	</p> 
                                            </th>
                                            <th  width="75px" >
                                            
                                                </th>
                                        
                                        <td rowspan="3"></td>
                                    </tr>
                                    <tr>
                                        
                                        <td height="1"> 
                                                <p class="verticalText">FECHA	</p>  
        
                                        </td>
                                        <td> </td>
                                        
                                    </tr>
                                    <tr>
                                        
                                        <td> 
                                                <p class="verticalText">FIRMA	</p>  
                                        </td>
                                        <td> </td>
                                        
                                    </tr>
                                </tbody>
                           </table>
                </th>

            </tr>
            <tr>
                <th scope="col-6"   width="50%" >
                   <table class=" table  table-bordered table-sm tablafirma"   >
                        <thead>
                            <tr>
                                <th    width="8px" >
                                        <p class="verticalText">	</p> 
                                </th>
                                <th  width="75px">
                                    
                                </th>
                                <th class="text-center h-auto" >
                                <p style="font-size:8px; ">SELLO DE LA INSTITUCION</p> 
                                </th>
                                
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                    <th    width="8px"  >
                                            <p class="verticalText" >LUGAR	</p> 
                                    </th>
                                    <th  width="75px" >
                                    
                                        </th>
                                
                                <td rowspan="3"></td>
                            </tr>
                            <tr>
                                
                                <td height="1"> 
                                        <p class="verticalText">FECHA	</p>  

                                </td>
                                <td> </td>
                                
                            </tr>
                            <tr>
                                
                                <td> 
                                        <p class="verticalText">FIRMA	</p>  
                                </td>
                                <td> </td>
                                
                            </tr>
                        </tbody>
                   </table>
                </th>

                <th scope="col-6"   width="50%">
                        <table class=" table  table-bordered table-sm tablafirma"   >
                                <thead>
                                    <tr>
                                        <th    width="8px" >
                                                <p class="verticalText">	</p> 
                                        </th>
                                        <th  width="75px">
                                            
                                        </th>
                                        <th class="text-center h-auto" >
                                        <p style="font-size:8px; ">SELLO DE LA INSTITUCION</p> 
                                        </th>
                                        
                                    </tr>
        
                                </thead>
                                <tbody>
                                    <tr>
                                            <th    width="8px"  >
                                                    <p class="verticalText" >LUGAR	</p> 
                                            </th>
                                            <th  width="75px" >
                                            
                                                </th>
                                        
                                        <td rowspan="3"></td>
                                    </tr>
                                    <tr>
                                        
                                        <td height="1"> 
                                                <p class="verticalText">FECHA	</p>  
        
                                        </td>
                                        <td> </td>
                                        
                                    </tr>
                                    <tr>
                                        
                                        <td> 
                                                <p class="verticalText">FIRMA	</p>  
                                        </td>
                                        <td> </td>
                                        
                                    </tr>
                                </tbody>
                           </table>
                </th>

            </tr>


            <tr>
                    <th scope="col-6" height="115" width="50%" class="text-center">  
    
                    <img style="border:1px solid black;margin:0" src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(130)->generate('LA PAPELETA N° '.$leave->id.' ES '.$leave->resp_status.' POR '.$leave->resp_name.' A LAS '.$leave->resp_chdate)) }} ">
                    </th>
                    <th scope="col-6" height="110">  
    
                    <p class="text-center" style="font-size:12px; border-top:1px solid black;">FIRMA DEL/LA TRABAJADOR/A </p>
            
                    </th>
    
                </tr>
                
           
            
        </thead>
    </table>

    
    @endif

</body>


</html>