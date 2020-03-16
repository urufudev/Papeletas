<?php

namespace App\Http\Controllers;
use App\Leave;
use App\User;
use App\Leavetype;
use App\Office;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;


class HomeController extends Controller
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
    public function index()
    {
        $leaves= Leave::all();
        $leavetypes= Leavetype::all();

          /* $mostleaves = Leave::
          
            where('status','ACTIVO')
        
            ->select('user_id', DB::raw('COUNT(id) as mostleaves'))
            ->groupBy('user_id')
            ->orderBy(DB::raw('COUNT(id)'), 'DESC')
            ->take(5)
            ->get(); */

            $mostleaves = DB::table('users as u')
                ->join('leaves as l','u.id','=','l.user_id')
                ->select('u.name','u.ap_paterno','u.ap_materno', DB::raw('COUNT(l.id) as mostleaves'))
                ->where('l.status','ACTIVO')
                ->whereMonth('l.created_at', Carbon::now()->format('m'))
                ->where('l.resp_status','AUTORIZADO')
                ->groupBy('name','ap_paterno','ap_materno')
                ->orderBy(DB::raw('COUNT(l.id)'), 'DESC')
                ->take(10)
                ->get();
        

        $leavesaut=Leave::where('resp_status','AUTORIZADO')
                ->where('user_id','auth'()->user()->id)
                ->where('status','ACTIVO')
                ->get();
       $leavesrec=Leave::where('resp_status','RECHAZADO')
                ->where('user_id','auth'()->user()->id)
                ->where('status','ACTIVO')
                ->get();
        $leavespen=Leave::where('resp_status','EN ESPERA')
                ->where('user_id','auth'()->user()->id)
                ->where('status','ACTIVO')
                ->get();

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
         /* dd($mostleaves ); */
        return view('home',compact('leaves','leavetypes','leavesaut','leavesrec','leavespen','mostleaves'));
    }
}
