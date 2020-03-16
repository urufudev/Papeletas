<?php

namespace App\Http\Controllers;

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use DB;

use App\Office;

class UserController extends Controller
{
    /**$users = User::select('league_name')
        ->where('status','=','ACTIVO')
        ->get(); */
    public function index()
    {
        

        $users = DB::table('users as u')
        ->join('offices as o', 'u.office_id', '=', 'o.id')
        ->select('u.id','u.name','u.email','u.password','u.dni','u.ap_paterno','u.ap_materno',
        'u.gender','u.f_birth','o.name as oficina','u.position','u.regime','u.phone','u.status')
        ->where('u.status','=','ACTIVO')
        ->get();


        return view('users.index',compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    { 
        
        
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $offices=Office::orderBy('name','ASC')->pluck('name','id');
        $roles=Role::get();
         
        return view('users.edit',compact('user','roles','offices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        //actualice el usuario  $user->update($request->all());
        
        /**$user->update(
            
            [
            'name' => $request['name'],
            'ap_paterno' => $request['ap_paterno'],
            'ap_materno' => $request['ap_materno'],
            'dni' => $request['dni'],
            'gender' => $request['gender'],
            'f_birth' => $request['f_birth'],
            'office_id' => $request['office_id'],
            'position' => $request['position'],
            'regime' => $request['regime'],
            'phone' => $request['phone'],
            
            
            'email' => $request['email'],
            'password' => bcrypt($request['password']),

            ]
            
            );
        */
        
        $user->name = $request['name'];
        $user->ap_paterno = $request['ap_paterno'];
        $user->ap_materno = $request['ap_materno'];
        $user->dni  =  $request['dni'];
        $user->gender  =  $request['gender'];
        $user->f_birth  =  $request['f_birth'];
        $user->office_id  =  $request['office_id'];
        $user->position  =  $request['position'];
        $user->regime  =  $request['regime'];
        $user->phone  =  $request['phone'];
        $user->email  =  $request['email'];
        
        if($request['password']!=null)
        {
            $user->password  =  bcrypt($request['password']);
        }
        $user->save();

        


        //actualize los roles
        $user->roles()->sync($request->get('roles'));


        return redirect()->route('users.index')
            ->with('info','USUARIO ACTUALIZADO CON EXITO');

        



    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $user=User::find($id)->update(['status' => 'SUSPENDIDO']);

        return back()->with('danger','USUARIO ELIMINADO CORRECTAMENTE');
    }
}
