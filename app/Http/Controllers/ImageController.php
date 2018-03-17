<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;

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

        //$image->move($destinationPath, $input['imagename']);

        //$this->postImage->add($input);

        return back()
            ->with('success', 'Image Upload successful')
            ->with('imageName', $input['imagename']);

    }
}
