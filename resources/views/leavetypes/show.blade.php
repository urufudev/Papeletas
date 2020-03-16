@extends('layouts.app')

@section('content')

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-blue-grey">
                    <h3><b>VER TIPO DE PAPELETA </b>
                    <a href="{{route('leavetypes.index')}}" class="btn btn-primary pull-right">
                    
                    <b>VOLVER  </b> 
                    </a></h3>
                    

                    </div>
                
                    <div class="panel-body">
                        <p> <strong>NOMBRE: </strong> {{$leavetype->name}} </p>
                        <p> <strong>SLUG: </strong> {{$leavetype->slug}} </p>
                        <p> <strong>DESCRIPCION: </strong> {{$leavetype->body}} </p>
                    </div>
                </div>
            </div>

@endsection