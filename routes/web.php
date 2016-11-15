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

Route::get('/', 'pagecontroller@login');

Route::get('/warden', function(){
	return view('warden');
});

Route::post('/warden', function(){
	return view('warden');
});

Route::get('/care taker', function(){
	return view('care taker');
});

Route::post('/care taker', function(){
	return view('care taker');
});


Route::get('/head department', function(){
	return view('head department');
});

Route::post('/head department', function(){
	return view('head department');
});


Route::get('/asst registrar sa', function(){
	return view('asst registrar sa');
});

Route::post('/asst registrar sa', function(){
	return view('asst registrar sa');
});

Route::get('/gymkhana', function(){
	return view('gymkhana');
});

Route::post('/gymkhana', function(){
	return view('gymkhana');
});

Route::get('/library', function(){
	return view('library');
});

Route::post('/library', function(){
	return view('library');
});

Route::get('/mech workshop', function(){
	return view('mech workshop');
});

Route::post('/mech workshop', function(){
	return view('mech workshop');
});

Route::get('/cc', function(){
	return view('cc');
});

Route::post('/cc', function(){
	return view('cc');
});


Route::get('/asst registrar finance', function(){
	return view('asst registrar finance');
});

Route::post('/asst registrar finance', function(){
	return view('asst registrar finance');
});

Route::get('/professor', function(){
	return view('professor');
});

Route::post('/professor', function(){
	return view('professor');
});

Route::get('/department', function(){
	return view('department');
});

Route::post('/department', function(){
	return view('department');
});

Route::get('/studentportal', function(){
	return view('studentportal');
});


Route::get('/profportal', function(){
	return view('profportal');
});


Route::post('logincheck' , 'pagecontroller@logincheck');

Auth::routes();

Route::get('/home', 'HomeController@index');
