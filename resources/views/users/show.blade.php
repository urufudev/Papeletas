@extends('layouts.app')

@section('content')

        <div class="col-md-8 col-md-offset-2">
            
            <div class="card profile-card">
                    <div class="profile-header">
                            &nbsp; &nbsp;</div>

                    <div class="profile-body">
                            <div class="image-area">
                                <img src="{{asset('image/logo_admin.png')}}" width="200" height="200" alt="AdminBSB - Profile Image">
                            </div>
                            <div class="content-area">
                                <h3>{{$user->ap_paterno}} {{$user->ap_materno}} {{$user->name}}</h3>
                                <p>{{$user->office->name}}</p>
                                <p>{{$user->position}}</p>
                            </div>
                        </div>
                        <div class="profile-footer">
                                <ul>
                                
                                    <li>
                                        <span>DNI</span>
                                        <span>{{$user->dni}}</span>
                                    </li> 
                                    <li>
                                        <span>REGIMEN</span>
                                        <span>{{$user->regime}}</span>
                                    </li>                                 
                                    <li>
                                        <span>CARGO</span>
                                        <span>{{$user->position}}</span>
                                    </li>
                                    <li>
                                        <span>FECHA DE NACIMIENTO</span>
                                        <span>{{$user->f_birth}}</span>
                                    </li>
                                    
                                    <li>
                                        <span>GENERO</span>
                                        <span>{{$user->gender}}</span>
                                    </li>
                                    <li>
                                        <span>CORREO</span>
                                        <span>{{$user->email}}</span>
                                    </li>
                                    <li>
                                        <span>CELULAR</span>
                                        <span>{{$user->phone}}</span>
                                    </li>
                                    <li>
                                        <span>ESTADO</span>
                                        <span>{{$user->status}}</span>
                                    </li>
                                    
                                </ul>
                           </div>
                
                {{-- <div class="panel-body">
                    <p><strong>DNI: </strong> {{$user->dni}}</p>
                    <p><strong>NOMBRE COMPLETO: </strong> {{$user->ap_paterno}} {{$user->ap_materno}} {{$user->name}}</p>
                    
                    <p><strong>GENERO: </strong> {{$user->gender}}</p>
                    <p><strong>FECHA DE NACIMIENTO: </strong> {{$user->f_birth}}</p>
                    <p><strong>CELULAR: </strong> {{$user->phone}}</p>
                    <p><strong>CORREO: </strong> {{$user->email}}</p>
                    <p><strong>REGIMEN: </strong> {{$user->regime}}</p>
                    <p><strong>OFICINA: </strong> {{$user->office->name}}</p>
                    <p><strong>CARGO: </strong> {{$user->position}}</p>
                    <p><strong>ESTADO: </strong> {{$user->status}}</p>
                </div> --}}
            </div>
        </div>
 
@endsection