@extends('layouts.app')

@section('content')

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-blue-grey">
                    <h3><b>EDITAR OFICINA</b>
                    <a href="{{route('offices.index')}}" class="btn btn-primary pull-right">
                    <b>VOLVER</b> 
                    </a></h3>
                    
                   

                    </div>
                
                    <div class="body">
                        {!! Form::model($office,['route'=>['offices.update', $office->id],
                        'method'=>'PUT']) !!}
                        
                            @include('offices.partials.form')
                            
                        {!! Form::close() !!}
                        
                    
                    </div>

                    
                </div>

            </div>


@endsection