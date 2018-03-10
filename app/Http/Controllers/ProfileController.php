<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index($slug){

    	$user = Auth::getUser();
    	
    	return view('profile.index', compact('user'));
    }

    public function uploadPic(Request $request){

    	$file = $request->file('pic');
    	if ($file){
    	$filename = $file->getClientOriginalName();
    	// $path = url('profilpic');
    	$file->move('profilpic', $filename);

    	$user_id = Auth::user()->id;
    	Storage::delete(url('profilpic/').Auth::user()->photo);

    	DB::table('users')->where('id', $user_id)->update(['photo'=>$filename]);
    	}else{};
    	return back();

    }
}
