<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfficeStoreRequest;
use App\Http\Requests\OfficeUpdateRequest;
use App\Office;
use App\User;
use App\RoleUser;
use Caffeinated\Shinobi\Models\Role;
use DB;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::orderBy('id', 'DESC')
            ->where('status', '=', 'ACTIVO')
            ->get();

        return view('offices.index', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficeStoreRequest $request)
    {
        $office = Office::create($request->all());

        return redirect()->route('offices.index')
            ->with('info', 'OFICINA CREADA CON EXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $office = Office::find($id);

        return view('offices.show', compact('office'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $office = Office::find($id);
        $roles = Role::all();
        $users = User::where('office_id', $office->id)
            ->get();

        return view('offices.edit', compact('office', 'users', 'roles'));
    }

    public function roledit($id)
    {
        $office = Office::find($id);
        $roles = Role::all();
        $users = User::where('office_id', $office->id)
            ->get();

        return view('offices.roledit', compact('office', 'users', 'roles'));
    }

    public function rolupdate(Request $request, $id)
    {
        if ($request->roles == []) {
            return redirect()->back()
            ->with('danger', 'SELEECCIONE UN ROL');
        }
        foreach ($request->roles as $key => $value) {
            foreach ($request->users as $user_id) {
                
                if ($key == $user_id) {
                    
                        
                   /*  for ($i=0; $i <= count($roles_users); $i++) { 
                        DB::table('role_user')
                        ->where('user_id', $user_id)
                        ->delete();
                    }     */
                    $roleUsers = RoleUser::where('user_id', $user_id)->get();
                        
                        foreach ($roleUsers as $role_user) {
                            $role_user->delete();
                        }
                    
                    foreach ($value as $key => $rol_id) {
                        DB::table('role_user')
                            ->insert([
                                'role_id' => $rol_id,
                                'user_id' => $user_id,
                                
                            ]);
                            

                    }


                } else {
                    echo 'no existe el usuario';
                }

            }
        }
        return redirect()->route('offices.index')
            ->with('info', 'OFICINA ACTUALIZADA CON EXITO');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfficeUpdateRequest $request, $id)
    {
        $office = Office::find($id);

        $office->fill($request->all())
            ->save();

        return redirect()->route('offices.index')
            ->with('info', 'OFICINA ACTUALIZADA CON EXITO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $office = Office::find($id)->update(['status' => 'SUSPENDIDO']);

        /**$office=Office::findOrFail($id);
         *
        $office=Office::find($id)->delete();

        $office->status='SUSPENDIDO';
        $office->update();

        return Redirect::to('offices.index');*/

        return back()->with('danger', 'OFICINA ELIMINADA CORRECTAMENTE ');
    }
}