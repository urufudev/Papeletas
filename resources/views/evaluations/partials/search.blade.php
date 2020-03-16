{!!Form::open(array('url'=>'evaluations','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}


<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        
        <div class="form-group">
            <div class="form-line">
                <select name="leave_type" id="leave_type" class="form-control">
                    <option value="" >-- SELECCIONE --</option>
                    @foreach ($leavetypes as $leavetype)
                        <option {{$leavetype->name == $tipo ? 'selected': ''}} value="{{$leavetype->name}}" >{{$leavetype->name}}</option>
                    @endforeach
                </select>
            </div>
            
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        
        <div class="form-group">
            <div class="form-line">
                <select name="leave_status" id="leave_status" class="form-control">
                            <option value="" >-- SELECCIONE --</option>
                            <option value="EN ESPERA" {{"EN ESPERA" == $estado ? 'selected': ''}}>EN ESPERA</option>
                            <option value="AUTORIZADO" {{"AUTORIZADO" == $estado ? 'selected': ''}}>AUTORIZADO</option>
                            <option value="RECHAZADO" {{"RECHAZADO" == $estado ? 'selected': ''}}>RECHAZADO</option>
                </select>
            </div>
            
        </div>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
        
        <div class="form-group">
            
            <div class="form-line">

                <input type="text" class="form-control" name="searchText" placeholder="BUSCAR" value="{{$search ? $search : ''}}">
            </div>
        </div>
    </div>
    
                                
    <button type="submit" class="btn btn-default waves-effect">
        <i class="material-icons">search</i>
        
    </button>



{{Form::close()}}