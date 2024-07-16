<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\customerController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\adminController;

Route::get('/', function () {
    return view('website/index'); 
});

Route::get('/contact',[contactController::class,'create']);
Route::post('/contact',[contactController::class,'store']);


Route::get('/shop',function(){
	return view('website/shop'); 
});

Route::get('/testimonial',function(){
	return view('website/testimonial'); 
});

Route::get('/why',function(){
	return view('website/why'); 
});


Route::get('/signup',[customerController::class,'create'])->middleware('customerbeforelogin');
Route::post('/signup',[customerController::class,'store'])->middleware('customerbeforelogin');

Route::get('/login',[customerController::class,'login'])->middleware('customerbeforelogin');
Route::post('/login_auth',[customerController::class,'login_auth'])->middleware('customerbeforelogin');


Route::get('/userlogout',[customerController::class,'logout'])->middleware('customerafterlogin');

Route::get('/profile',[customerController::class,'profile'])->middleware('customerafterlogin');
Route::get('/profile/{id}',[customerController::class,'edit'])->middleware('customerafterlogin');

Route::post('/profile/{id}',[customerController::class,'update'])->middleware('customerafterlogin');


// blade template

Route::get('blade',function(){
	return view('website/blade'); 
});

//===================================================================

Route::group(['middleware'=>['adminbeforelogin']],function(){

Route::get('/admin-login',[adminController::class,'index']);
Route::post('/alogin_auth',[adminController::class,'login_auth']);

});

Route::group(['middleware'=>['adminafterlogin']],function(){


	Route::get('/adminlogout',[adminController::class,'logout']);

	Route::get('/dashboard',function(){
		return view('admin/dashboard'); 
	});

	Route::get('/add_cate',function(){
		return view('admin/add_cate'); 
	});

	Route::get('/manage_cate',function(){
		
		return view('admin/manage_cate'); 
	});

	Route::get('/add_prod',function(){
		return view('admin/add_prod'); 
	});

	Route::get('/manage_prod',function(){
		return view('admin/manage_prod'); 
	});

	Route::get('/manage_cust',[customerController::class,'show']);
	Route::get('/manage_cust/{id}',[customerController::class,'destroy']);

	Route::get('/add_emp',function(){
		return view('admin/add_emp'); 
	});

	Route::get('/manage_emp',function(){
		return view('admin/manage_emp'); 
	});

	Route::get('/manage_feed',function(){
		return view('admin/manage_feed'); 
	});

	Route::get('/manage_cont',[contactController::class,'show']);
	Route::get('/manage_cont/{id}',[contactController::class,'destroy']);
});	