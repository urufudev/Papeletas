<div class="form-group">
    {{Form::label('name','NOMBRE')}}
    <div class="form-line">
    {{Form::text ('name',null,['class'=>'form-control','style'=>'text-transform:uppercase;' ,'onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) }}
    </div>
</div>
<div class="form-group">
    {{Form::label('slug','URL AMIGABLE')}}
    <div class="form-line">
    {{Form::text ('slug',null,['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{Form::label('description','DESCRIPCION')}}
    <div class="form-line">
    {{Form::textarea ('description',null,['class'=>'form-control','style'=>'text-transform:uppercase;' ,'onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) }}
    </div>
</div>
<hr>
<h3>PERMISO ESPECIAL</h3>
<div class="form-group">
        {{Form::label('special','ESTADO &nbsp;')}} 
        <label>
        {{Form::radio('special','all-access',null,['id'=>'all-acces','class'=>'with-gap radio-col-blue'])}} <label for="all-acces">ACCESO TOTAL    
            </label>
        </label>
        <label>
        {{Form::radio('special','no-access',null,['id'=>'no-access','class'=>'with-gap radio-col-blue'])}} <label for="no-access">NINGUN ACCESO    
            </label>
        </label>
    </div>

<h3>LISTA DE PERMISOS</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach($permissions as $permission)
        <li>
            <label>
            {{-- <input id="{{$permission->id}}" name="permissions[]" type="checkbox" value="{{$permission->id}}"> --}}
                {{Form::checkbox('permissions[]',$permission->id,null,['id'=>$permission->id])}}
                <label for="{{$permission->id}}">{{$permission->name}}</label>
                <em>({{$permission->description ?: 'Sin Descripcion'}})</em>
            </label>
        </li>

        @endforeach

    </ul>
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