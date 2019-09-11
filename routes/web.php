<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','admin']], function(){
    Route::get('/dashbord', function(){
        return view('admin.dashbord');
    });

    Route::resource('/property','PropertyController');
    Route::resource('/propertytype', 'TypeController');
   
});