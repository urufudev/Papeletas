<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Office;
use Caffeinated\Shinobi\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after regisation.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function showRegistrationForm()
    {
        $offices=Office::orderBy('name','ASC')
        ->where('status','=','ACTIVO')
        ->pluck('name','id');
        return view('auth.register', compact('offices'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'ap_paterno' => 'required|string|max:255',
            'ap_materno' => 'required|string|max:255',
            'dni' => 'required|string|max:8|unique:users',
            'gender' => 'required|string|max:255',
            'f_birth' => 'required',
            'office_id' => 'required',
            'position'=>'required|string|max:255',
            'regime'=>'required',
            'phone'=>'required',
            
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       
        $user= User::create([
            'name' => $data['name'],
            'ap_paterno' => $data['ap_paterno'],
            'ap_materno' => $data['ap_materno'],
            'dni' => $data['dni'],
            'gender' => $data['gender'],
            'f_birth' => $data['f_birth'],
            'office_id' => $data['office_id'],
            'position' => $data['position'],
            'regime' => $data['regime'],
            'phone' => $data['phone'],
            'status' => 'ACTIVO',
            
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        foreach (Role::all() as $rol) {
            if ($rol->name == 'EMPLEADOS') {
                $user->roles()->sync($rol->id);
            }
            
        }
        
        return $user;
        
    }
}
