<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use App\Leavetype;

class DasboardController extends Controller
{
    public function index()
    {
        $leaves= Leave::all();
       

        return view('layouts.app', compact('leaves'));
        
    }
}
