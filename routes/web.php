<?php


// Route::get('/', function () {
//     return view('welcome');
// });
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
    Route::resource('/propertytype', 'TypeController');   
});