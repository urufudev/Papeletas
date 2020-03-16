<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>SISTEMA DE PAPELETAS DE SALIDA</title>

        <!-- Fonts -->
          <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      

        <!-- Styles -->
        <link href="{{asset('landing/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('landing/css/mdb.min.css')}}" rel="stylesheet">
        <link href="{{asset('landing/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
    </head>
    <body>
        

<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="{{ url('/') }}" ><b>SCPS :: SISTEMA DE CONTROL DE PAPELETAS DE SALIDA</b></a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          
          
        </ul>

        <!-- Right -->
        

        <ul class="navbar-nav nav-flex-icons">
            @if (Route::has('login'))
            @auth
            <li class="nav-item">
                    <a class="nav-link" href="{{ url('/home') }}"> <b>INICIO</b>  <span class="sr-only">(current)</span></a>
            </li>
            
            @else
            <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"> <b>INICIAR SESION</b>   <span class="sr-only">(current) </span></a>
                </li>
                
                <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"> <b>REGISTRARSE</b>    <span class="sr-only">(current)</span></a>
                </li>
                    
                
            @endauth
            
        </ul>
        @endif

      </div>

    </div>
  </nav>
 

<!-- Full Page Intro -->
<div id="app" class="view full-page-intro" style="background-image: url({{asset('landing/css/img/fondo_landing.jpg')}} ); background-repeat: no-repeat; background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center" style="background-color: rgba(0,0,0,.7);">

      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-md-8 mb-4 white-text text-center text-md-left">

            <h3 class="display-4 font-weight-bold">SCPS :: SISTEMA DE CONTROL DE PAPELETAS DE SALIDA</h3>

            <hr class="hr-light">

            <p>
              <strong>Sistema encargado de la gestion de papeletas de salida de la Dirección Regional de Educacion Ayacucho</strong>
            </p>

            @auth
            <a href="{{ url('/home') }}"><button type="button" class="btn btn-primary btn-lg waves-effect waves-light"> <b>IR A PANEL</b> </button></a>
        @else
        {{-- <a href="{{ route('login') }}"><button type="button" class="btn btn-primary btn-lg waves-effect waves-light"> <b>INICIAR SESION</b> </button></a>
        --}} 
        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-login">
              <b>INICIAR SESION</b>  
              </button>

        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-register">
                   <b>REGISTRARSE</b> 
                  </button>
                
        @endauth

        
            

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-4 col-xl-4 mb-4  ">

            <!--Card-->
            <img src="{{asset('image/logo_admin.png')}}" width="400" height="400" class="rounded mx-auto d-block" >
            <!--/.Card-->

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </div>
      <!-- Content -->

    </div>
    <!-- Mask & flexbox options-->
    
  
  <!-- Modal -->
  

    @include('auth.modalogin')
    @include('auth.modalregister')
  </div>
  <!-- Full Page Intro -->


      
    
        <!-- SCRIPTS -->
    
        <!-- JQuery -->
        <script src="{{asset('landing/js/jquery-3.4.0.min.js')}}"></script>
        <script src="{{asset('plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>
        <!-- Bootstrap tooltips -->
        <script src="{{asset('landing/js/tether.min.js')}}"></script>
        
     
        <!-- Bootstrap core JavaScript -->
        <script src="{{asset('landing/js/bootstrap.min.js')}}"></script>
    
        <!-- MDB core JavaScript -->
        <script src="{{asset('landing/js/mdb.min.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>
        

    
    <script>
            $(document).ready(function(){
               
                $("#f_birth").inputmask("dd/mm/yyyy");
                $("#phone").inputmask("999-999-999");
                
                
            });
        </script>
         
    
    </body>
    
   
</html>
