@extends('layouts.app')

@section('content')

 
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-blue-grey">
                    <h3><b>CREAR PAPELETA</b>
                    <a href="{{route('leaves.index')}}" class="btn btn-primary pull-right">
                    <b>VOLVER </b> 
                    </a></h3>

                    </div>
                
                    <div class="body">
                        {!! Form::open(['route'=>'leaves.store']) !!}
                            @include('leaves.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


@endsection