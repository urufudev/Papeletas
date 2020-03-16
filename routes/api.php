<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 
/* Route::get('leaves', function (){
    return datatables()
        ->eloquent(App\Office::query()->orderBy('id','Desc'))
        ->addColumn('btn', 'offices/partials/actions')
        ->rawColumns(['btn'])
        ->toJson();
});  */

/* Route::get('leaves',function(Request $request){
    return Auth::user();
    return App\Leave::orderBy('id','DESC')
    ->where('user_id',auth()->user()->id)
    ->where('status','=','ACTIVO');

    return datatables()
        ->eloquent()
        ->toJson();
}); */