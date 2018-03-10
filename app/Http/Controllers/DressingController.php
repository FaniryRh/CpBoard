<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DressingController extends Controller
{
    public function index(){
    	return view('dressing.index', compact('user'));
    }
}
