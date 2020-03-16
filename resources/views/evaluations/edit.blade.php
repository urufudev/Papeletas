@extends('layouts.app')

@section('content')

    
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-blue-grey">
                    <h3><b>EVALUACION DE PAPELETA</b>
                    <a href="{{route('evaluations.index')}}" class="btn btn-primary pull-right">
                    <b>VOLVER </b> 
                    </a></h3>
                    
                   

                    </div>
                
                    <div class="body ">
                        <div class="row">   
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="card ">
                                        <div class="header">
                                            <h2>
                                                {{$evaluation->user->full_name}} <small>NOMBRE</small>
                                            </h2>
                                
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                    {{$evaluation->leavetype->name}} <small>TIPO DE PAPELETA</small>
                                                </h2>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="card">
                                                <div class="header">
                                                    <h2>
                                                        {{$evaluation->description.' DESDE '.$evaluation->fh_from_format.' HASTA '.$evaluation->fh_to_format}} <small>DESCRIPCION</small>
                                                    </h2>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                        
                        {!! Form::model($evaluation,['route'=>['evaluations.update', $evaluation->id],
                        'method'=>'PUT']) !!}
                            @include('evaluations.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
     

@endsection