<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Office;

class WelcomeController extends Controller
{
    
    public function index()
    {
        $offices=Office::orderBy('name','ASC')
        ->where('status','=','ACTIVO')
        ->get(['name', 'id']);
        return view('welcome',compact('offices')); 
    }
}
