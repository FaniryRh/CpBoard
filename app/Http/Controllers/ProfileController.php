<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class ProfileController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}
    public function index($slug){
    	$user = User::where('slug', $slug)->firstOrFail();
    	return view('profile.index', compact('user'));
	}

    public function uploadPic(Request $request){
		$filename = $request->get('pic');
		$user_id = Auth::user()->id;
		$old_pic = Auth::user()->photo;
		unlink(public_path().'/profilpic/'.$old_pic);
		unlink(public_path().'/images/'.$old_pic);
		DB::table('users')->where('id', $user_id)->update(['photo'=>$filename]);
		return back();
    }
}
