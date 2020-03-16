@extends('layouts.app')

@section('content')

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header bg-blue-grey">
                <h3><b>CREAR ROL</b>
                    <a href="{{route('roles.index')}}" class="btn btn-primary pull-right">
                    <b>VOLVER </b> 
                    </a></h3>
                </div>
                
                <div class="body">
                    {!! Form::open(['route'=>'roles.store'])!!}
                        @include('roles.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

@endsection