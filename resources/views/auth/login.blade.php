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
                    <div class="header text-center">
                    
                    <h3><b>INICIAR SESIÓN</b>
                        </h3>
                    
                    </div>
    
                    <div class="body">
                        
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
    
                            <div class="form-group p-t-15 {{ $errors->has('dni') ? ' has-error' : '' }}">
                                <label for="dni" class="col-md-4 control-label">DNI</label>
    
                                <div class="col-md-6">
                                    <div class="form-line">
                                    <input id="dni" type="text" maxlength="8" class="form-control" name="dni" value="{{ old('dni') }}" required autofocus>
    
                                    @if ($errors->has('dni'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('dni') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group p-t-15 {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">CONTRASEÑA</label>
    
                                <div class="col-md-6 ">
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
                                <div class="col-md-6 col-md-offset-4">
                                        <div class="col-xs-7 ">
                                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="filled-in chk-col-indigo"> 
                                                <label for="remember"> <b>RECUERDAME</b> </label>
                                        </div>  
                                </div>
                            </div>
    
                            
                            <div class="form-group">
                                    <div class="col-xs-12 text-center">
                                        <button type="submit" class="btn btn-lg btn-primary">
                                            <b>INICIAR SESION</b> 
                                        </button>
                                    </div>
                                </div>
                                
                            <div class="form-group">
                                    <div class="col-xs-12 text-center">
                                        <a href="{{ route('register') }}"><h4>REGISTRARSE</h4></a>
                                    </div>
                                    
                                </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </div>
</div>
    <!-- Jquery Core Js -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('plugins/node-waves/waves.js')}}"></script>

  

</body>

</html>



