<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Leave;
use App\Office;
use App\Leavetype;
use Illuminate\Http\Request;
use App\Http\Requests\ReportPersonalRequest;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function personal(Request $request)
    {

        $f_from=$request->f_from ?? $request->f_from;
        $f_to=$request->f_to ?? $request->f_to;

        $leaves = Leave::where('status','ACTIVO')->whereBetween('fh_from', [$request->f_from,$request->f_to])->get();

        

        /* $leaves= Leave::all();

        

        $leavesaut=Leave::where('resp_status','AUTORIZADO')
                ->where('user_id','auth'()->user()->id)
                ->get();
       $leavesrec=Leave::where('resp_status','RECHAZADO')
                ->where('user_id','auth'()->user()->id)
                ->get();
        $leavespen=Leave::where('resp_status','EN ESPERA')
                ->where('user_id','auth'()->user()->id)
                ->get(); */

        //$max_leaves_for_user_for_offices = auth()->user()->office;
        /*                                     $offices = Office::all();
                                            //return $users = auth()->user()->office->take(2)->get();
                                            foreach($offices as $office){
                                            
                                                foreach($office->users as $user){
                                                    foreach( $user->leaves as $leave){

                                                        return $leave;
                                                    }
                                                }
                                            } */
       /*  Select Top 1 IDCELULAR, COUNT(IDCELULAR) AS VENTAS 
        from Venta 
        Group by IdCelular 
        Order by count(2) desc */
        
        return view('reports.personal',compact('leaves'));
    }

    public function consultapersonal(ReportPersonalRequest $request){

        $f_from=$request->f_from ?? $request->f_from;
        $f_to=$request->f_to ?? $request->f_to;

        $leaves = Leave::whereBetween('f_from', [$request->f_from,$request->f_to])->get();

        return dd($leaves);
    }
}
