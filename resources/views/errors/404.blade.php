<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>SCPS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        
        <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
       
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           
            

        <div class="content">
                <div class="title m-b-md">
                <div class="text-center">
                <img src="{{asset('image/logo_admin.png')}}" width="500" height="500" class="rounded mx-auto d-block" >
                </div>
                    
                   <b>404 NO EXISTE ESTA RUTA  </b>
                    
                    
                </div>
                   
                        <a href="{{ url('/home') }}"><button type="button" class="btn btn-primary btn-lg"> <b>IR A INCIO</b> </button></a>
                   
                
                    
                
            </div>
        </div>
    </body>
</html>
