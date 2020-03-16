<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SCPS :: SISTEMA DE CONTROL DE PAPELETAS DE SALIDA</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    
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
        
    <!-- Bootstrap DatePicker Css -->
    <link href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{asset('plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <link href="{{asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet" />


    
    <!-- Custom Css -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('css/themes/all-themes.css')}}" rel="stylesheet" />
    @yield('styles')
</head>

<body class="theme-blue">
    
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    
    <nav class="navbar">
        <div class="container-fluid">
            
            <div class="navbar-header">
                
                <a href="javascript:void(0);" class="bars"></a>
             
                <img src="{{asset('image/logo_admin.png')}}" class="text-center" width="48" height="48" alt="User" />
                    <a class="navbar-brand" href="{{ url('/home') }}"><b>SCPS :: SISTEMA DE CONTROL DE PAPELETAS DE SALIDA</b> </a>

                
            </div>
            <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="navbar-brand" ><span class="label ">{{Auth::user()->office->name}}</span> </a>
                    </li>
                </ul>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    @if (Auth::user()->gender == 'MASCULINO')
                    <img src="{{asset('image/user_m.png')}}" width="48" height="48" alt="User" />
                    @else
                    <img src="{{asset('image/user_f.png')}}" width="48" height="48" alt="User" />
                    @endif
                   
               
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->ap_paterno .' '. Auth::user()->ap_materno .' '. Auth::user()->name }}</div>
                    <div class="email"><b>{{ Auth::user()->position}}</b></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            {{-- <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li> --}}
                            <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i class="material-icons">input</i>SALIR</a>
                                
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU DE NAVEGACIÓN</li>
                    <li class="active">
                        <a href="{{ url('/home') }}">
                            <i class="material-icons">dashboard</i>
                            <span>INICIO</span>
                        </a>
                    </li>
                    @can('roles.index')
                    <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">call_split</i>
                                <span>ROLES</span>
                            </a>
                            <ul class="ml-menu">
                                    @can('roles.create')
                                <li>
                                    <a href="{{route('roles.create')}}">CREAR ROLES</a>
                                </li>
                                @endcan
                                <li>
                                    <a href="{{route('roles.index')}}">GESTIONAR ROLES</a>
                                </li>
                                
                            </ul>
                        </li>
                    @endcan
                    @can('offices.index')
                    <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">business</i>
                                <span>OFICINA</span>
                            </a>
                            <ul class="ml-menu">
                                    @can('offices.create')
                                <li>
                                    <a href="{{route('offices.create')}}">CREAR OFICINA</a>
                                </li>
                                @endcan
                                <li>
                                    <a href="{{route('offices.index')}}">GESTIONAR OFICINA</a>
                                </li>
                                
                            </ul>
                        </li>
                    @endcan
                    @can('users.index')
                    <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">group</i>
                                <span>EMPLEADOS</span>
                            </a>
                            <ul class="ml-menu">
                                    
                                <li>
                                    <a href="{{route('users.index')}}">GESTIONAR EMPLEADOS</a>
                                </li>
                                
                            </ul>
                        </li>
                    @endcan
                    @can('leavetypes.index')
                    <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">sort</i>
                                <span>TIPO DE PAPELETA</span>
                            </a>
                            <ul class="ml-menu">
                                    @can('leavetypes.create')
                                <li>
                                    <a href="{{route('leavetypes.create')}}">CREAR TIPO DE PAPELETA</a>
                                </li>
                                @endcan
                                <li>
                                    <a href="{{route('leavetypes.index')}}">GESTIONAR TIPO DE PAPELETA</a>
                                </li>
                                
                            </ul>
                        </li>
                    @endcan
                    
                    @can('leaves.index')
                    <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">collections_bookmark</i>
                                <span>PAPELETAS</span>
                            </a>
                            <ul class="ml-menu">
                                    @can('leaves.create')
                                <li>
                                    <a href="{{route('leaves.create')}}">CREAR PAPELETA</a>
                                </li>
                                @endcan
                                <li>
                                    <a href="{{route('leaves.index')}}">GESTIONAR PAPELETA</a>
                                </li>
                                
                            </ul>
                        </li>
                    @endcan
                    @can('evaluations.index')
                    <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">gavel</i>
                                <span>EVALUACION</span>
                            </a>
                            <ul class="ml-menu">
                                    
                                <li>
                                    <a href="{{route('evaluations.index')}}">GESTIONAR EVALUACION</a>
                                </li>
                                
                            </ul>
                        </li>
                    @endcan

                    @can('leaves.index')
                    <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">insert_chart</i>
                                <span>REPORTES</span>
                            </a>
                            <ul class="ml-menu">
                                
                                <li>
                                    <a href="{{route('reports.personal')}}">REPORTE PERSONAL PAPELETA</a>
                                </li>
                                
                                {{-- @can('leaves.create')
                                <li>
                                    <a href="{{route('reports.index')}}">GESTIONAR PAPELETA</a>
                                </li>
                                @endcan --}}
                                
                            </ul>
                        </li>
                    @endcan
                    
                   {{--  <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">input</i>
                                <span>SALIR DEL SISTEMA</span>
                            </a>
                            <ul class="ml-menu">
                                    
                                    <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">SALIR</a>
                                        
                                    </a>
            
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    </li>
                                
                            </ul>
                        </li> --}}
                        <li class="header"></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class=" waves-effect waves-block">
                                <i class="material-icons col-red">input</i>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                <span>SALIR</span>
                            </a>
                        </li>

                        
                    
                    
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019<a href="javascript:void(0);"> SCPS - DREA INFORMATICA</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    </section>

    <section class="content">
        <div class="container-fluid">
                @if(session('info'))
                
                        <div class="col-lg-12">
                            <div class="alert alert-success">
                                {{session('info')}}
                            </div>
                        </div>
                 @elseif(session('danger'))
                
                        <div class="col-lg-12">
                            <div class="alert alert-danger">
                                {{session('danger')}}
                            </div>
                        </div>
                @elseif(session('warning'))
                
                        <div class="col-lg-12">
                            <div class="alert alert-warning">
                                {{session('warning')}}
                            </div>
                        </div>
                
                
                @endif
            @yield('content')
            
            
            


           
        </div>
    </section>
  



    <!-- Jquery Core Js -->
   
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>


    <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('plugins/momentjs/moment-with-locales.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <script src="{{asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>



    <script src="{{asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>

    

    <script src="{{asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>


    <script src="{{asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>



    

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('plugins/morrisjs/morris.js')}}"></script>

    <!-- ChartJs -->
    <script src="{{asset('plugins/chartjs/Chart.bundle.js')}}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{asset('plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.time.js')}}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{asset('plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>
    <script src="{{asset('plugins/infobox/infobox-1.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
    @yield('scripts')


 
         
    <!-- Demo Js -->
    <script src="{{asset('js/demo.js')}}"></script>

  





</body>

</html>


