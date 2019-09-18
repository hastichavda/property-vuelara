<?php



Route::get('/','PropertyController@getAllProperty');

Route::get('/property','PostController@getAllProperty');
Route::get('/get-property/{id}/','PropertyController@filterProperty');
Route::get('/property-paginate/{id}/','PropertyController@readMore');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','admin']], function(){
    Route::get('/dashbord', function(){
        return view('admin.dashbord');
    });
    Route::resource('/property','PropertyController');
    Route::post('/property/{id}', 'PropertyController@update');
    Route::get('/profile','PropertyController@profile');
    Route::resource('/propertytype', 'TypeController');   
    Route::get('/inquery', 'InqueryController@display');
    Route::delete('/inquery/{id}','InqueryController@inquerydelete');
});

Route::group(['middleware' => ['auth']],function() {
    Route::resource('/connect', 'InqueryController'); 
});