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
		$size = null;
		if($file){$size = $file->getClientSize();}else{};

		//SI LE FICHIER EXISTE
    	if ($file){
    	$filename = $file->getClientOriginalName();
		$size = $file->getClientSize();

			//SI LA TAILLE DU FICHIER EST INFERIEUR A 5MB
			if($size < 5000000){
			$file->move('profilpic', $filename);

			$user_id = Auth::user()->id;
			Storage::delete(url('profilpic/').Auth::user()->photo);

			DB::table('users')->where('id', $user_id)->update(['photo'=>$filename]);
			//REVENIR SUR changePic
			return back();
			}else{
				return view('profile.pic')->with(['exist'=> 1,'noFileMessage'=> 'Selectionnez une image moin de 2MB de taille!']);
			};
		}else{
			return view('profile.pic')->with(['exist'=> 1,'noFileMessage'=> 'Aucun fichier']);
		}


    }
}
