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
    return view('welcome');
});

 Auth::routes();

// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
 Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// // Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm');

/*
Route::get('/hotel_listing', 'PiHotelMasterController@index');
Route::get('/add_hotel', 'PiHotelMasterController@create');
Route::post('add_hotel', 'PiHotelMasterController@store')->name('add_hotel');
Route::post('upload-image',['as'=>'image.upload','uses'=>'PiHotelMasterController@uploadImages']);
*/
Route::get('/hotel_listing', 'PiHotelMasterController@index');
Route::get('/add_hotel', 'PiHotelMasterController@create');
Route::post('add_hotel', 'PiHotelMasterController@store')->name('add_hotel');
Route::post('upload-image',['as'=>'image.upload','uses'=>'PiHotelMasterController@uploadImages']);
Route::get('/edit_hotel/{id}','PiHotelMasterController@edit')->name('edit_hotel');
Route::post('/edit_hotel/{id}','PiHotelMasterController@update')->name('edit_hotel');
Route::get('/galleryimage_delete/{id}/{no}', 'PiHotelMasterController@gallery_image_delete');
Route::get('/ajax_state/{id}/{state_id?}', 'PiHotelMasterController@ajax_state');
Route::get('/ajax_city/{id}', 'PiHotelMasterController@ajax_city');
Route::get('/add_hotel_amenties/{id}', 'PiHotelMasterController@addEdit_hotel_amenties')->name('add_hotel_amenties');
Route::post('/add_hotel_amenties/{id}', 'PiHotelMasterController@addEdit_hotel_amenties')->name('add_hotel_amenties');
Route::post('/search_hotel', 'PiHotelMasterController@search_hotel')->name('search_hotel');

Route::get('/hotel_room_listing', 'PiHotelRoomMasterController@index');
Route::get('/add_hotel_room', 'PiHotelRoomMasterController@create');
Route::post('add_hotel_room', 'PiHotelRoomMasterController@store')->name('add_hotel');
Route::post('upload-image',['as'=>'image.upload','uses'=>'PiHotelMasterController@uploadImages']);
Route::post('hotel_room_search', 'PiHotelRoomMasterController@hotel_room_search')->name('hotel_room_search');
Route::get('/edit_hotel_room/{id}','PiHotelRoomMasterController@edit')->name('edit_hotel_room');
Route::post('/edit_hotel_room/{id}','PiHotelRoomMasterController@update')->name('edit_hotel_room');
Route::get('/hotel_room_delete/{id}','PiHotelRoomMasterController@destroy')->name('delete_hotel_room');

// Route::get('subadmin/login', 'Auth\SubadminLoginController@showLoginForm');
// Route::post('subadmin/login', 'Auth\SubadminLoginController@login')->name('subadmin.login');

// /* Routes for admin */
// Route::group(['prefix' => 'subadmin','middleware' => 'assign.guard:subadmin,subadmin/login'],function(){
	
// 	Route::get('home',function ()
// 	{
// 		return view('subadminhome');
// 	});
// });

Route::group(['prefix' => 'admin','middleware' => 'assign.guard:admin,admin/login'],function(){
	
	// Route::get('home',function ()
	// {
	// 	return view('adminhome');
	// });
	Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login');
	Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::get('/home', 'HomeController@index')->name('home');
