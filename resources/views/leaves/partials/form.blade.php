{{Form::hidden('user_id',auth()->user()->id)}}
@if(count($errors)>0)
<div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
@endif



<div class="form-group" style="border:1px solid #2196f3;margin:0">
    {{Form::label('leavetype_id','TIPO DE PAPELETA')}}
    <div class="form-line">
    {{Form::select('leavetype_id',$leavetypes,null,['class'=>'form-control'])}}
    </div>
</div>


@isset($leave)
    <div class="form-group">
        {{Form::label('fh_date','FECHA')}}
        <div class="form-line">
        {{Form::date('fh_date', $leave->fh_to ? \Carbon\Carbon::parse($leave->fh_to)->format('Y-m-d') : null ,['class'=>' form-control'])}}
        </div>  
    </div>

    <div class="form-group">
        {{Form::label('fh_from','HORA DE SALIDA ')}}
        <div class="form-line">
        {{Form::time('fh_from',$leave->fh_from ? \Carbon\Carbon::parse($leave->fh_from)->format('h:i') : null,['class'=>' form-control'])}}
        </div>  
    </div>
    <div class="form-group">
        {{Form::label('fh_to','HORA DE RETORNO')}}
        <div class="form-line">
        {{Form::time('fh_to',$leave->fh_to ? \Carbon\Carbon::parse($leave->fh_to)->format('h:i') : null,['class'=>' form-control'])}}
        </div>   
    </div>
@else
    <div class="form-group">
        {{Form::label('fh_date','FECHA')}}
        <div class="form-line">
        {{Form::date('fh_date',null ,['class'=>' form-control'])}}
        </div>  
    </div>

    <div class="form-group">
        {{Form::label('fh_from','HORA DE SALIDA ')}}
        <div class="form-line">
        {{Form::time('fh_from', null,['class'=>' form-control'])}}
        </div>  
    </div>
    <div class="form-group">
        {{Form::label('fh_to','HORA DE RETORNO')}}
        <div class="form-line">
        {{Form::time('fh_to', null,['class'=>' form-control'])}}
        </div>   
    </div>
@endisset


<div class="form-group">
    {{Form::label('description','DESCRIPCION')}}
    <div class="form-line">
    {{Form::textarea('description',null,['class'=>'form-control','style'=>'text-transform:uppercase;','placeholder'=>'ESCRIBA LA DESCRIPCION AQUI','maxlength'=>'120' ,'onkeyup'=>'javascript:this.value=this.value.toUpperCase();'])}}
    </div>
</div>




<div class="form-group">
        <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect"> <h4><b>GUARDAR</b></h4> </button>
</div>

@section('scripts')

<script src="{{asset('vendor/stringToSlug/jquery.stringToSlug.min.js')}}">
</script>

<script>
    $(document).ready(function(){
        $("#name,#slug").stringToSlug({
            callback:function(text){
                $("#slug").val(text);
            }
        });

        
        $('.datetimepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm',
        lang: 'es',
        weekStart: 1,
        nowButton : true,
		switchOnClick : true,
        nowText:'Hoy',
        cancelText:'Cancelar',
        shortTime: true,

        });

        
        

    });
</script>

@endsection

