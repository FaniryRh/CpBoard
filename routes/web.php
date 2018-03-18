<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/profile/{slug}', 'ProfileController@index');
Route::get('/profile', 'ProfileController@index');
Route::get('/dressing', 'DressingController@index')->name('dressing');
Route::get('/actu', 'ActuController@index')->name('actu');
Route::get('/friend', 'FriendController@index')->name('friend');
Route::get('/message', 'MessageController@index')->name('message');
Route::get('/changePic', function(){
	return view('profile.pic')->with(['exist'=> 0, 'noFileMessage'=>'']);
});

Route::post('/uploadPic', 'ProfileController@uploadPic');

//image
Route::get('resizeImage', 'ImageController@resizeImage');
Route::post('resizeImagePost',['as'=>'resizeImagePost','uses'=>'ImageController@resizeImagePost']);