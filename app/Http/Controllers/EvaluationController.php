<?php

namespace App\Http\Controllers;

use App\User;
use App\Leave;
use App\Leavetype;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\EvaluationUpdateRequest;
use Illuminate\Pagination\LengthAwarePaginator;


class EvaluationController extends Controller
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
        $leavetypes=Leavetype::orderBy('name','ASC')
        ->where('status','=','ACTIVO')   
        ->get();
        $page = 1;
        $tipo = $request->get('leave_type') ?? $request->get('leave_type');
        $estado= $request->get('leave_status') ?? $request->get('leave_status');
        $search = $request->get('searchText') ?? trim($request->get('searchText'));
        
        if($request->get('page')){

            $page = $request->get('page');
        }
        /* $data = [100, '200', 300, '400', 500];
        $data = array_where($data, function ($key, $value) {
            return is_string($value);
        });

        return $data; */

        foreach (auth()->user()->roles as $rol) {
            if($rol->name == 'RESPONSABLE DE OFICINA'){
                $oficina_id = auth()->user()->office->id;

                $usuarios = User::         
                where('status','=','ACTIVO')
                ->where('office_id',$oficina_id)
                ->where('id','!=',auth()->user()->id)
                ->get();
                
                $leavesFromUser = array();



                foreach($usuarios as $user){

                    $resp_name = auth()->user()->ap_paterno.' '.auth()->user()->ap_materno.', '.auth()->user()->name;

                    if($user->leaves->count() > 0 ){
                        foreach($user->leaves->where('status','=','ACTIVO') as $leave){
                         /* foreach($user->leaves->where('resp_name','=',$resp_name)->where('status','=','ACTIVO') as $leave)   */ 
                            array_push($leavesFromUser, $leave);
                        }
                    }  
                }
                $leavesDesc = collect($leavesFromUser)->sortByDesc('id');
                //$leavesC = new LengthAwarePaginator($leavesFromUser, count($leavesFromUser), 7, 1, ['path'=>url('evaluations')]);
                $leavesC = $this->paginate($leavesDesc, 7, $page, url('evaluations'));
            /*  return $leavesC;   */
                
                return view('evaluations.index', ['evaluations' => $leavesC ,'leavetypes'=>$leavetypes, 'tipo' => $tipo, 'estado' => $estado, 'search' => $search]);
               /*  return  $leavesC ; */
                
            }elseif($rol->name == 'Admin'){
                
                $evaluations=Leave::orderBy('id','DESC')            
                ->where('status','=','ACTIVO')
                
                ->where('resp_status', 'LIKE', "%$estado%")
                ->whereHas('user', function ($query) use ($search) {
                    if($search){
                        $query->where('name', 'LIKE', "%$search%")
                            ->orWhere('ap_paterno', 'LIKE', "%$search%")
                            ->orWhere('ap_materno', 'LIKE', "%$search%");
                    }
                })
                ->whereHas('leavetype', function ($query) use ($tipo) {
                    if($tipo){
                        $query->where('name', 'LIKE', "%$tipo%");
                    }
                })
                ->paginate(7);
                //return $evaluations;
                return view('evaluations.index', compact('evaluations','leavetypes', 'tipo', 'estado', 'search'));
            }

            elseif($rol->name == 'ADMINISTRADOR ALTERNO'){
                
                $evaluations=Leave::orderBy('id','DESC')            
                ->where('status','=','ACTIVO')
                
                ->where('resp_status', 'LIKE', "%$estado%")
                ->whereHas('user', function ($query) use ($search) {
                    if($search){
                        $query->where('name', 'LIKE', "%$search%")
                            ->orWhere('ap_paterno', 'LIKE', "%$search%")
                            ->orWhere('ap_materno', 'LIKE', "%$search%");
                    }
                })
                ->whereHas('leavetype', function ($query) use ($tipo) {
                    if($tipo){
                        $query->where('name', 'LIKE', "%$tipo%");
                    }
                })
                ->paginate(7);
                //return $evaluations;
                return view('evaluations.index', compact('evaluations','leavetypes', 'tipo', 'estado', 'search'));
            }
        } 
        
        
        
        //return view('evaluations.index', compact('evaluations'));
    }
    
    public function paginate($items, $perPage = 15, $page = null, $baseUrl = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        $lap = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);

        if ($baseUrl) {
            $lap->setPath($baseUrl);
        }

        return $lap;
    }

    public function show($id)
    {
        $evaluation = Leave::find($id);

        return view('evaluations.show', compact('evaluation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leavetypes=Leavetype::orderBy('name','ASC')
        ->where('status','=','ACTIVO')   
        ->pluck('name','id');


        $evaluation = Leave::find($id);
        
        if($evaluation->resp_status == 'EN ESPERA')
        {
            return view('evaluations.edit', compact('evaluation','leavetypes'));
        }
        else
        {
            return redirect()->route('evaluations.index')
            ->with('danger','LA PAPELETA YA FUE EVALUADA');
        }
        


        return view('evaluations.edit', compact('evaluation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id 
     * $evaluation->fill($request->all())
 *       ->save();

     * @return \Illuminate\Http\Response
     */
    public function update(EvaluationUpdateRequest $request, $id)
    {
        $hora_actual= Carbon::now();
        $evaluation = Leave::find($id);

        $evaluation->resp_status=$request->get('resp_status');
        $evaluation->resp_msg=$request->get('resp_msg');
        $evaluation->resp_chdate=$hora_actual->toDateTimeString();
        $evaluation->resp_name=$request->get('resp_name');

        $evaluation->leavetype_id=$request->get('leavetype_id');
        
        $evaluation->update();
        
        return redirect()->route('evaluations.index')
            ->with('info','PAPELETA EVALUADA CON EXITO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
