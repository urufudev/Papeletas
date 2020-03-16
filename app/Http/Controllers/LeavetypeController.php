<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LeavetypeStoreRequest;
use App\Http\Requests\LeavetypeUpdateRequest;
use App\Http\Controllers\Controller;

use App\Leavetype;


class LeavetypeController extends Controller
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
        $leavetypes=Leavetype::orderBy('id','DESC')
            ->where('status','=','ACTIVO')
            ->get();
        
        return view('leavetypes.index', compact('leavetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leavetypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeavetypeStoreRequest $request)
    {
        $leavetype=Leavetype::create($request->all());

        return redirect()->route('leavetypes.index')
            ->with('info','TIPO DE PAPELETA CREADA CON EXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leavetype = Leavetype::find($id);

        return view('leavetypes.show', compact('leavetype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leavetype = Leavetype::find($id);

        return view('leavetypes.edit', compact('leavetype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LeavetypeUpdateRequest $request, $id)
    {
        $leavetype = Leavetype::find($id);

        $leavetype->fill($request->all())
        ->save();

        return redirect()->route('leavetypes.index')
            ->with('info','TIPO DE PAPELETA ACTUALIZADA CON EXITO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $leavetype=Leavetype::find($id)->update(['status' => 'SUSPENDIDO']);

       /**$leavetype=Leavetype::findOrFail($id);
        * 
            $leavetype=Leavetype::find($id)->delete();
        
       $leavetype->status='SUSPENDIDO';
       $leavetype->update();
       
       return Redirect::to('leavetypes.index');*/

        return back()->with('danger','TIPO DE PAPELETA ELIMINADA CORRECTAMENTE ' );
    }
}
