<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function resizeImage()

    {
        return view('resizeImage');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function resizeImagePost(Request $request)

    {

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,JPG|max:5000',
        ]);

        $image = $request->file('image');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/profilpic');
        $destinationPath2 = public_path('/images');
        $img = Image::make($image->getRealPath());
        
        $img->resize(365, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['imagename']);
        //$destinationPath = public_path('/images');
        $img2 = Image::make($image->getRealPath());
        $img2->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath2 . '/' . $input['imagename']);

        $user_id = Auth::user()->id;


        if(Auth::user()->photo){
        $old_pic = Auth::user()->photo;
        unlink(public_path().'/profilpic/'.$old_pic);
        unlink(public_path().'/images/'.$old_pic);
        }else{};

        DB::table('users')->where('id', $user_id)->update(['photo'=>$input['imagename']]);

        return back()
            ->with('success', 'Image Upload successful')
            ->with('imageName', $input['imagename']);

    }
}
