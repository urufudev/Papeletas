
{{Form::hidden('user_id',auth()->user()->id)}}

<div class="form-group">
    {{Form::label('name','NOMBRE')}}
    <div class="form-line">
    {{Form::text ('name',null,['class'=>'form-control','style'=>'text-transform:uppercase;' ,'onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) }}
    </div>
</div>
<div class="form-group">
    {{Form::label('ap_paterno','AP. PATERNO')}}
    <div class="form-line">
    {{Form::text ('ap_paterno',null,['class'=>'form-control','style'=>'text-transform:uppercase;' ,'onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) }}
    </div>
</div>
<div class="form-group">
    {{Form::label('ap_materno','AP. MATERNO')}}
    <div class="form-line">
    {{Form::text ('ap_materno',null,['class'=>'form-control','style'=>'text-transform:uppercase;' ,'onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) }}
    </div>
</div>
<div class="form-group">
    {{Form::label('dni','DNI')}}
    <div class="form-line">
    {{Form::text ('dni',null,['class'=>'form-control']) }}
    </div>
</div>


<div class="form-group">
        {{Form::label('gender','GENERO')}} 
        <label>
        {{Form::radio('gender','MASCULINO',null,['id'=>'MASCULINO','class'=>'custom-control-input'])}} <label for="MASCULINO">MASCULINO    
            </label>
        </label>
        <label>
        {{Form::radio('gender','FEMENINO',null,['id'=>'FEMENINO','class'=>'custom-control-input'])}} <label for="FEMENINO">FEMENINO    
            </label>
        </label>
</div>

<div class="form-group">
    {{Form::label('f_birth','FECHA DE NACIMIENTO')}}
    <div class="form-line">
    {{Form::text ('f_birth',null,['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{Form::label('office_id','OFICINAS')}}
    <div class="form-line">
    {{Form::select('office_id',$offices,null,['class'=>'form-control'])}}
    </div>
</div>
<div class="form-group">
    {{Form::label('position','CARGO')}}
    <div class="form-line">
    {{Form::text ('position',null,['class'=>'form-control','style'=>'text-transform:uppercase;' ,'onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) }}
    </div>
</div>
<div class="form-group">
    {{Form::label('regime','REGIMEN')}}
    <div class="form-line">
    <select name="regime" id="regime" class="form-control">
        <option value="DECRETO LEGISLATIVO N° 276" {{$user->regime === 'DECRETO LEGISLATIVO N° 276' ? 'selected' : '' }}>DECRETO LEGISLATIVO N° 276</option>
        <option value="DECRETO LEGISLATIVO N° 1057" {{$user->regime === 'DECRETO LEGISLATIVO N° 1057' ? 'selected' : '' }}>DECRETO LEGISLATIVO N° 1057</option>
        <option value="DECRETO LEGISLATIVO N° 728" {{$user->regime === 'DECRETO LEGISLATIVO N° 728' ? 'selected' : '' }}>DECRETO LEGISLATIVO N° 728</option>
        <option value="LEY N° 29944" {{$user->regime === 'LEY N° 29944' ? 'selected' : '' }}>LEY N° 29944 </option>
        <option value="LEY N° 30512" {{$user->regime === 'LEY N° 30512' ? 'selected' : '' }}>LEY N° 30512</option>
        <option value="LEY N° 30328" {{$user->regime === 'LEY N° 30328' ? 'selected' : '' }}>LEY N° 30328</option>
        <option value="LEY N° 30493" {{$user->regime === 'LEY N° 30493' ? 'selected' : '' }}>LEY N° 30493</option>
    </select>
    </div>
</div>
<div class="form-group">
    {{Form::label('phone','CELULAR')}}
    <div class="form-line">
    {{Form::text ('phone',null,['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{Form::label('email','CORREO')}}
    <div class="form-line">
    {{Form::text ('email',null,['class'=>'form-control','style'=>'text-transform:uppercase;' ,'onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) }}
    </div>
</div>
<div class="form-group">

    {{Form::label('password','CONTRASEÑA')}}
    <div class="form-line">
    <input name="password" type="password" class="form-control"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" >

    </div>
</div>

<hr>
<h3> <b>LISTA DE ROLES</b></h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach($roles as $role)
        <li>
                <label>
                        {{-- <input id="{{$permission->id}}" name="permissions[]" type="checkbox" value="{{$permission->id}}"> --}}
                            {{Form::checkbox('roles[]',$role->id,null,['id'=>$role->id])}}
                            <label for="{{$role->id}}">{{$role->name}}</label>
                            <em>({{$role->description ?: 'Sin Descripcion'}})</em>
                </label>

           
        </li>

        @endforeach

    </ul>
</div>
<div class="form-group">
    
        <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect"> <h4><b>GUARDAR</b></h4> </button>
    </div>

