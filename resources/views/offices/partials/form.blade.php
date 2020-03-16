<div class="form-group">
    {{Form::label('name','NOMBRE DE OFICINA')}}
    <div class="form-line">
    {{Form::text('name',null,['class'=>'form-control','id'=>'name','style'=>'text-transform:uppercase;' ,'onkeyup'=>'javascript:this.value=this.value.toUpperCase();'])}}
    </div>
</div>

<div class="form-group">
    {{Form::label('slug','URL AMIGABLE')}}
    <div class="form-line">
    {{Form::text('slug',null,['class'=>'form-control','id'=>'slug'])}}
    </div>
</div>  

<div class="form-group">
    {{Form::label('body','DESCRIPCIÓN')}}
    <div class="form-line">
    {{Form::textarea('body',null,['class'=>'form-control','style'=>'text-transform:uppercase;' ,'onkeyup'=>'javascript:this.value=this.value.toUpperCase();'])}}
    </div>
</div>

<div class="form-group">
    {{Form::label('status','ESTADO &nbsp;')}} 
    <label>
    {{Form::radio('status','ACTIVO',null,['id'=>'ACTIVO','class'=>'with-gap radio-col-blue'])}} <label for="ACTIVO">ACTIVO    
        </label>
    </label>
    <label>
    {{Form::radio('status','SUSPENDIDO',null,['id'=>'SUSPENDIDO','class'=>'with-gap radio-col-blue'])}} <label for="SUSPENDIDO">SUSPENDIDO    
        </label>
    </label>
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
    });
</script>

@endsection

