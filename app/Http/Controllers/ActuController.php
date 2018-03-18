<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	return view('actualite.index', compact('user'));
    }
}
