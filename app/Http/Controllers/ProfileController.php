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

		$filename = $request->get('pic');
		$user_id = Auth::user()->id;
		DB::table('users')->where('id', $user_id)->update(['photo'=>$filename]);

		return back();

    }
}
