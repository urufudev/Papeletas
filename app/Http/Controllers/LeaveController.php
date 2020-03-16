<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LeaveStoreRequest;
use App\Http\Requests\LeaveUpdateRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


use App\Leavetype;
use App\Leave;


class LeaveController extends Controller
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
    public function index(Request $request)
    {
        /* $leavetypes=Leavetype::orderBy('name','ASC')
        ->where('status','=','ACTIVO')   
        ->get(); */
        $leaves=Leave::orderBy('id','DESC')
            ->where('user_id','auth'()->user()->id)
            ->where('status','=','ACTIVO')
            ->paginate(7);
        
        return view('leaves.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leavetypes=Leavetype::orderBy('name','ASC')
        ->where('status','=','ACTIVO')   
        ->pluck('name','id');

        return view('leaves.create',compact('leavetypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeaveStoreRequest $request)
    { 
       /*  $leave=Leave::create($request->all());  $request->fh_date.' '.$request->fh_from;*/
       if($request->fh_from > $request->fh_to){
           return back()->withInput()
            ->withErrors(['fh_from' => 'LA HORA DE SALIDA ES MAYOR A LA HORA DE RETORNO']);
       }
       else {
        $leave = new Leave();
        $leave->user_id = $request->user_id;
        $leave->leavetype_id = $request->leavetype_id;
        $leave->fh_from = $request->fh_date.' '.$request->fh_from;
        $leave->fh_to =$request->fh_date.' '.$request->fh_to;
        $leave->description = $request->description;
 
        if($leave->save()){
             return redirect()->route('leaves.index')
                 ->with('info','PAPELETA CREADA CON EXITO');
        }
       }
      
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leave = Leave::find($id);
        $this->authorize('pass',$leave);

        return view('leaves.show', compact('leave'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leave = Leave::find($id);
        $this->authorize('pass',$leave);


        $leavetypes=Leavetype::orderBy('name','ASC')->pluck('name','id');
        
        

        if($leave->resp_status == 'EN ESPERA')
        {
        return view('leaves.edit', compact('leave','leavetypes'));
        }
        else
        {
            return redirect()->route('leaves.index')
            ->with('danger','LA PAPELETA YA FUE EVALUADA');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LeaveUpdateRequest $request, $id)
    {
        $leave = Leave::find($id);
        $this->authorize('pass',$leave);

        $leave->user_id = $request->user_id;
        $leave->leavetype_id = $request->leavetype_id;
        $leave->fh_from = $request->fh_date.' '.$request->fh_from;
        $leave->fh_to =$request->fh_date.' '.$request->fh_to;
        $leave->description = $request->description;
        $leave->save();

        return redirect()->route('leaves.index')
            ->with('info','PAPELETA ACTUALIZADA CON EXITO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leave=Leave::find($id);
        $this->authorize('pass',$leave);

        if($leave->resp_status == 'EN ESPERA')
        {
           

            $leave->update(['status' => 'SUSPENDIDO']);

            return back()->with('info','PAPELETA ELIMINADA CORRECTAMENTE ' );
        }
        else
        {
            return redirect()->route('leaves.index')
            ->with('warning','LA PAPELETA YA FUE EVALUADA');
        }
         
    }

    public function pdf(Request $request,$id){
        
        $leave = Leave::find($id);
        $this->authorize('pass',$leave);


        if($leave->resp_status == 'AUTORIZADO')
        {
           

            $pdf = \PDF::loadView('pdf.leave',compact('leave'))->setPaper('A4', 'portrait');
            return $pdf->stream();
        }
        elseif($leave->resp_status == 'RECHAZADO')
        {
            return redirect()->route('leaves.index')
            ->with('danger','LA PAPELETA FUE RECHAZADA');
        }
        else
        {
            return redirect()->route('leaves.index')
            ->with('warning','LA PAPELETA AUN NO FUE EVALUADA');
        }



        

  

    }

}
