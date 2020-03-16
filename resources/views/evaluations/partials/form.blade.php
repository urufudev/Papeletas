{{Form::hidden('user_id',auth()->user()->id)}}
{{Form::hidden('resp_name',auth()->user()->ap_paterno.' '.auth()->user()->ap_materno .', '.auth()->user()->name)}}
{{Form::hidden('resp_chdate',auth()->user()->id)}}

@if(count($errors)>0)
                        <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                <li><b>{{$error}}</b></li>
                                @endforeach
                                </ul>
                            </div>
@endif  
<label>
        
        {{Form::checkbox('checkbox',null,null,['id'=>'checkbox'])}}
        <label for="checkbox"> <b>CHECK SI DESEA EDITAR EL TIPO DE PAPELETA</b> </label>
        
</label>


<fieldset class="leavetype_edit">
        <div class="form-group shownDiv" style="display:none;">
            {{Form::label('leavetype_id','TIPO DE PAPELETA')}}
            <div class="form-line">
            {{Form::select('leavetype_id',$leavetypes,null,['class'=>'form-control'])}}
            </div>
        </div>
</fieldset>


<div class="form-group">
    {{Form::label('resp_status','ESTADO',['class'=>'font-underline'])}}
    <div class="form-line">
    <select name="resp_status" id="resp_status" class="form-control">
    <option value="" {{$evaluation->resp_status === 'EN ESPERA' ? 'selected' : '' }}>EN ESPERA</option>
        <option value="AUTORIZADO" {{$evaluation->resp_status === 'AUTORIZADO' ? 'selected' : '' }}>AUTORIZADO</option>
        <option value="RECHAZADO" {{$evaluation->resp_status === 'RECHAZADO' ? 'selected' : '' }}>RECHAZADO</option>
     </select>
    </div>
    
</div>






<div class="form-group">
    {{Form::label('resp_msg','MENSAJE DEL RESPONSABLE')}}
    <div class="form-line">
    {{Form::textarea ('resp_msg',null,['rows'=>'3','class'=>'form-control','style'=>'text-transform:uppercase;','placeholder'=>'ESCRIBA MENSAJE DE RESPONSABLE' ,'onkeyup'=>'javascript:this.value=this.value.toUpperCase();'])}}
    </div>
</div>


{{-- <div class="form-group">
    {{Form::label('resp_chdate','FECHA/HORA DE EVALUACIÓN (AAAA-MM-DD HH:MM:SS)')}}
    <div class="form-line">
            
        <input type="text" name="resp_chdate" id="resp_chdate" class="datetimepicker form-control">
   
    </div>
</div>
 --}}



<div class="form-group">
        <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect"> <h4><b>GUARDAR</b></h4> </button>
</div>

@section('scripts')

<script src="{{asset('vendor/stringToSlug/jquery.stringToSlug.min.js')}}">
</script>

<script>
    $(document).ready(function(){
        $('#checkbox').on('change', function() {
        console.log('changed');
        $('.shownDiv').toggle();
        });


        $("#name,#slug").stringToSlug({
            callback:function(text){
                $("#slug").val(text);
            }
        });

        
        $('.datetimepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        lang: 'es',
        weekStart: 1,
        nowButton : true,
		switchOnClick : true,
        nowText:'Hoy',
        cancelText:'Cancelar',
        shortTime: true,

        });
        
        $("#resp_chdate").bootstrapMaterialDatePicker("setDate", new Date());
        /* $('#resp_chdate').bootstrapMaterialDatePicker({
            "setDate": new Date(),

        }); */
        


        $('#fh_to').bootstrapMaterialDatePicker({ weekStart : 0 });
        $('#fh_from').bootstrapMaterialDatePicker({ weekStart : 0 }).on('change', function(e, date)
        {
        $('#fh_to').bootstrapMaterialDatePicker('setMinDate', date);
       
        
        });
        

    });
</script>

@endsection

