@extends('layouts.app')

@section('content')

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-blue-grey">
                    <h3><b>VER OFICINA </b>
                    <a href="{{route('offices.index')}}" class="btn btn-primary pull-right">
                    
                    <b>VOLVER  </b> 
                    </a></h3>
                    

                    </div>
                
                    <div class="body">
                        <p> <strong>NOMBRE: </strong> {{$office->name}} </p>
                        <p> <strong>SLUG: </strong> {{$office->slug}} </p>
                        <p> <strong>DESCRIPCION: </strong> {{$office->body}} </p>
                    </div>
                </div>
            </div>


@endsection