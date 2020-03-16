@extends('layouts.app')

@section('content')

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            
                @isset($users)
                <div class="card">
                        <div class="header bg-blue-grey">
                        <h3><b>LISTA DE EMPLEADOS EN LA OFICINA</b><a href="{{route('offices.index')}}" class="btn btn-primary pull-right">
                                <b>VOLVER</b> 
                                </a>
                        </h3>
                        
                       
                    
                        </div>
                        <div class="panel-body">
                    <form action="{{route('offices.rolupdate',$office->id)}}" method="POST">
                        
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">NOMBRE</th>
                                @foreach ($roles as $role)
                                    <th class="text-center">
                                        {{$role->name}}
                                
                                        
                                    </th>    
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                      <b>{{$user->ap_paterno}} {{$user->ap_materno}}, {{$user->name}}</b>  
                                      <input type="hidden" name="users[]" value="{{$user->id}}">
                                    </td>

                                    @foreach ($roles as $role)
                                    
                                    <td class="text-center">
                                            
                                    <input type="checkbox" value="{{$role->id}}"   id="roles[{{$user->id}}][{{$role->id}}]" name="roles[{{$user->id}}][]" @foreach ($user->roles as $rol_user)
                                        {{  $role->id == $rol_user->id ? 'checked' : ''}}@endforeach>
                                        <label for="roles[{{$user->id}}][{{$role->id}}]"></label>
                                        
                                        
                                    </td>    
                                    @endforeach
                                    
                                    
                                </tr>
                                
                                @endforeach
                            
                            </tbody>
                        </table>
                        <div class="form-group">
                                <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect"> <h4><b>ACTUALIZAR ROLES</b></h4> </button>
                        </div>
                        </div>

                        
                    </div>
                        @endisset
                    </form>
            </div>
        </div>
    </div>

@endsection