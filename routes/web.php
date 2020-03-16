<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/','WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Routes

Route::middleware(['auth'])->group(function () {

    //Roles
    Route::post('roles/store', 'RoleController@store')->name('roles.store')
        ->middleware('permission:roles.create');

    Route::get('roles', 'RoleController@index')->name('roles.index')
        ->middleware('permission:roles.index');

    Route::get('roles/create', 'RoleController@create')->name('roles.create')
        ->middleware('permission:roles.create');

    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
        ->middleware('permission:roles.edit');

    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
        ->middleware('permission:roles.show');

    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
        ->middleware('permission:roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
        ->middleware('permission::roles.edit');

    //Productos

    Route::get('products', 'ProductController@index')->name('products.index')
        ->middleware('permission:products.index');

    Route::post('products/store', 'ProductController@store')->name('products.store')
        ->middleware('permission:products.create');

    Route::get('products/create', 'ProductController@create')->name('products.create')
        ->middleware('permission:products.create');

    Route::put('products/{product}', 'ProductController@update')->name('products.update')
        ->middleware('permission:products.edit');

    Route::get('products/{product}', 'ProductController@show')->name('products.show')
        ->middleware('permission:products.show');

    Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy')
        ->middleware('permission:products.destroy');

    Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit')
        ->middleware('permission:products.edit');

    //Oficina

    Route::get('offices', 'OfficeController@index')->name('offices.index')
        ->middleware('permission:offices.index');

    Route::post('offices/store', 'OfficeController@store')->name('offices.store')
        ->middleware('permission:offices.create');

    Route::get('offices/create', 'OfficeController@create')->name('offices.create')
        ->middleware('permission:offices.create');

    Route::put('offices/{office}/update', 'OfficeController@update')->name('offices.update')
        ->middleware('permission:offices.edit');

    Route::get('offices/{office}', 'OfficeController@show')->name('offices.show')
        ->middleware('permission:offices.show');

    Route::delete('offices/{office}', 'OfficeController@destroy')->name('offices.destroy')
        ->middleware('permission:offices.destroy');

    Route::get('offices/{office}/edit', 'OfficeController@edit')->name('offices.edit')
        ->middleware('permission:offices.edit');

    Route::get('offices/{office}/roledit', 'OfficeController@roledit')->name('offices.roledit')
        ->middleware('permission:offices.edit');

    Route::put('offices/{office}', 'OfficeController@rolupdate')->name('offices.rolupdate')
        ->middleware('permission:offices.edit');

    //TipoPapeleta

    Route::get('leavetypes', 'LeavetypeController@index')->name('leavetypes.index')
        ->middleware('permission:leavetypes.index');

    Route::post('leavetypes/store', 'LeavetypeController@store')->name('leavetypes.store')
        ->middleware('permission:leavetypes.create');

    Route::get('leavetypes/create', 'LeavetypeController@create')->name('leavetypes.create')
        ->middleware('permission:leavetypes.create');

    Route::put('leavetypes/{leavetype}', 'LeavetypeController@update')->name('leavetypes.update')
        ->middleware('permission:leavetypes.edit');

    Route::get('leavetypes/{leavetype}', 'LeavetypeController@show')->name('leavetypes.show')
        ->middleware('permission:leavetypes.show');

    Route::delete('leavetypes/{leavetype}', 'LeavetypeController@destroy')->name('leavetypes.destroy')
        ->middleware('permission:leavetypes.destroy');

    Route::get('leavetypes/{leavetype}/edit', 'LeavetypeController@edit')->name('leavetypes.edit')
        ->middleware('permission:leavetypes.edit');

    //Papeleta

    Route::get('leaves', 'LeaveController@index')->name('leaves.index')
        ->middleware('permission:leaves.index');
        Route::get('api/leaves',function(){

            return datatables()
                ->eloquent(App\Leave::orderBy('id','DESC')
                ->with(['leavetype','user'])
                ->where('user_id',auth()->user()->id)
                ->where('status','=','ACTIVO'))
                ->addColumn('status_c','leaves.partials.status')
                ->addColumn('btn','leaves.partials.actions')

                ->rawColumns(['btn','status_c'])
                ->toJson();
        });

    Route::post('leaves/store', 'LeaveController@store')->name('leaves.store')
        ->middleware('permission:leaves.create');

    Route::get('leaves/create', 'LeaveController@create')->name('leaves.create')
        ->middleware('permission:leaves.create');

    Route::put('leaves/{leave}', 'LeaveController@update')->name('leaves.update')
        ->middleware('permission:leaves.edit');

    Route::get('leaves/{leave}', 'LeaveController@show')->name('leaves.show')
        ->middleware('permission:leaves.show');

    Route::delete('leaves/{leave}', 'LeaveController@destroy')->name('leaves.destroy')
        ->middleware('permission:leaves.destroy');

    Route::get('leaves/{leave}/edit', 'LeaveController@edit')->name('leaves.edit')
        ->middleware('permission:leaves.edit');

    Route::get('leaves/{leave}/pdf', 'LeaveController@pdf')->name('leaves.pdf')
        ->middleware('permission:leaves.pdf');

    //EVALUACION Papeleta

    Route::get('evaluations', 'EvaluationController@index')->name('evaluations.index')
        ->middleware('permission:evaluations.index');

    Route::put('evaluations/{evaluations}', 'EvaluationController@update')->name('evaluations.update')
        ->middleware('permission:evaluations.edit');

    Route::get('evaluations/{evaluations}', 'EvaluationController@show')->name('evaluations.show')
        ->middleware('permission:evaluations.show');

    Route::get('evaluations/{evaluations}/edit', 'EvaluationController@edit')->name('evaluations.edit')
        ->middleware('permission:evaluations.edit');

    //Users

    Route::get('users', 'UserController@index')->name('users.index')
        ->middleware('permission:users.index');

    Route::put('users/{user}', 'UserController@update')->name('users.update')
        ->middleware('permission:users.edit');

    Route::get('users/{user}', 'UserController@show')->name('users.show')
        ->middleware('permission:users.show');

    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
        ->middleware('permission:users.destroy');

    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
        ->middleware('permission:users.edit');

    
    //Reports

    Route::get('reports', 'ReportController@personal')->name('reports.personal')
        ->middleware('permission:users.index');
    Route::post('reports/personal', 'ReportController@consultapersonal')->name('reports.consulta')
        ->middleware('permission:users.index');




});