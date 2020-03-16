@if($resp_status=='EN ESPERA')
                                    
<b style="color:blue;">{{$resp_status}}</b>

@elseif($resp_status=='AUTORIZADO')
<b style="color:green;">{{$resp_status}}</b>

@elseif($resp_status=='RECHAZADO')
<b style="color:red;">{{$resp_status}}</b>
@endif