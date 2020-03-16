<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SCPS :: SISTEMA DE CONTROL DE PAPELETAS DE SALIDA</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body class="login-page">
    
<div class="container">
    <div class="login-box ">
        <div class="logo">
                <div class="image text-center">
                        <img src="{{asset('image/logo_admin.png')}}" width="200" height="200" />
                </div>
            <a href="#"><b>SCPS</b> SISTEMA DE CONTROL DE PAPELETAS DE SALIDA</a>
            <small>GESTION DE PAPELETAS DE SALIDA</small>
        </div>

       


        <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="header">
    
                        <h3><b>REGISTRAR NUEVO EMPLEADO</b>
                        </h3>
                    
                    </div>
    
                    @if(count($errors)>0)
                            <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif  
    
                    <div class="body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            
    
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">NOMBRE</label>
    
                                <div class="col-md-6">
                                    <div class="form-line">
                                            <input id="name" type="text" class="form-control text-uppercase" name="name" value="{{ old('name') }}" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required autofocus>
                                    
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('ap_paterno') ? ' has-error' : '' }}">
                                <label for="ap_paterno" class="col-md-4 control-label">AP. PATERNO</label>
    
                                <div class="col-md-6">
                                    <div class="form-line">
                                    <input id="ap_paterno" type="text" class="form-control" name="ap_paterno" value="{{ old('ap_paterno') }}" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required autofocus>
                                    
                                    @if ($errors->has('ap_paterno'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ap_paterno') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('ap_materno') ? ' has-error' : '' }}">
                                <label for="ap_materno" class="col-md-4 control-label">AP. MATERNO</label>
    
                                <div class="col-md-6">
                                    <div class="form-line">
                                    <input id="ap_materno" type="text" class="form-control" name="ap_materno" value="{{ old('ap_materno') }}" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required autofocus>
    
                                    @if ($errors->has('ap_materno'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ap_materno') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                                <label for="dni" class="col-md-4 control-label">DNI</label>
    
                                <div class="col-md-6">
                                    <div class="form-line">
                                    <input id="dni" type="dni" class="form-control" name="dni" value="{{ old('dni') }}"  maxlength="8" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
    
                                    @if ($errors->has('dni'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('dni') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label for="gender" class="col-md-4 control-label">GENERO</label>
    
                                <div class="col-md-6">
                                    
                                    
                                    <input id="MASCULINO" class="with-gap radio-col-blue" name="gender" type="radio" value="MASCULINO">
                                    <label for="MASCULINO">MASCULINO
                                    </label>
                                    
                                    <input id="FEMENINO" class="with-gap radio-col-pink" name="gender" type="radio" value="FEMENINO">
                                    
                                    <label for="FEMENINO">FEMENINO    
                                    </label>
                    
                                </div>
                            </div>
    
                            <div class="form-group{{ $errors->has('f_birth') ? ' has-error' : '' }}">
                                <label for="f_birth" class="col-md-4 control-label">FECHA DE NACIMIENTO</label>
    
                                <div class="col-md-6">
                                    <div class="form-line">
                                    <input id="f_birth" type="text" class="form-control" name="f_birth" value="{{ old('f_birth') }}" required>
    
                                    @if ($errors->has('f_birth'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('f_birth') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group{{ $errors->has('office_id') ? ' has-error' : '' }}">
                                <label for="office_id" class="col-md-4 control-label">OFICINA</label>
    
                                <div class="col-md-6">
                                    
                                {{Form::select('office_id',$offices,null,['class'=>'form-control'])}}
                                    
    
                                </div>
                            </div>
    
                            <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                <label for="position" class="col-md-4 control-label">CARGO</label>
    
                                <div class="col-md-6">
                                    <div class="form-line">
                                    <input id="position" type="text" class="form-control" name="position" value="{{ old('position') }}" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
    
                                    @if ($errors->has('position'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('position') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group{{ $errors->has('regime') ? ' has-error' : '' }}">
                                <label for="regime" class="col-md-4 control-label">REGIMEN</label>
    
                                <div class="col-md-6">
                                
                                    <select name="regime" id="regime" class="form-control">
                                        <option value="DECRETO LEGISLATIVO N° 276" selected>DECRETO LEGISLATIVO N° 276</option>
                                        <option value="DECRETO LEGISLATIVO N° 1057">DECRETO LEGISLATIVO N° 1057</option>
                                        <option value="DECRETO LEGISLATIVO N° 728">DECRETO LEGISLATIVO N° 728</option>
                                        <option value="LEY N° 29944">LEY N° 29944</option>
                                        <option value="LEY N° 30512">LEY N° 30512</option>
                                        <option value="LEY N° 30328">LEY N° 30328</option>
                                        <option value="LEY N° 30493">LEY N° 30493</option>
                                        
    
                                    </select>
                      
                                    @if ($errors->has('regime'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('regime') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">TELEFONO</label>
    
                                <div class="col-md-6">
                                    <div class="form-line">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
    
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                             
    
                             
                            
    
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">CORREO</label>
    
                                <div class="col-md-6">
                                        <div class="form-line">
                                    <input id="email" type="email" class="form-control"  name="email" value="{{ old('email') }}" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
    
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>
                            </div>
    
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">CONTRASEÑA</label>
    
                                <div class="col-md-6">
                                    <div class="form-line">
                                    <input id="password" type="password" class="form-control" name="password" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
    
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">CONFIRMAR CONTRASEÑA</label>
    
                                <div class="col-md-6">
                                    <div class="form-line">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        <h4><b>REGISTRAR</b></h4> 
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
    <!-- Jquery Core Js -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>

    
    <script>
            $(document).ready(function(){
                $('select').selectpicker();
                $("#f_birth").inputmask("dd/mm/yyyy");
                $("#phone").inputmask("999-999-999");
                
        
            });
        </script>
   <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
        
    <!-- Bootstrap Core Js -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('plugins/node-waves/waves.js')}}"></script>




</body>

</html>




