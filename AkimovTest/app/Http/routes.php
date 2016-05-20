<?php



Route::get('/', ['as' => 'country','uses' => 'CountryController@index']);
Route::resource('country', 'CountryController');
Route::resource('country.city','CityesController');
Route::post('destroycountry', ['as' => 'destroy','uses' => 'CountryController@delete']);
Route::post('updatecountry', ['as' => 'update','uses' => 'CountryController@update']);
Route::post('reloadcountry', ['as' => 'reload','uses' => 'CountryController@reloadcountry']);
Route::post('country/{:num}', ['as' => 'countryid','uses' => 'CountryController@show']);
Route::post('country/{idc}/city/{id}', ['as' => 'cityid','uses' => 'CityesController@show']);
Route::post('destroycity', ['as' => 'destroy','uses' => 'CityesController@delete']);
Route::post('updatecity', ['as' => 'update','uses' => 'CityesController@update']);
Route::post('reloadcity', ['as' => 'reload','uses' => 'CityesController@reloadcountry']);
Route::get('add', ['as' => 'addform','uses' => 'CountryController@addform']);
Route::post('addcountry', ['as' => 'addcountry','uses' => 'CountryController@add']);
Route::post('addcity', ['as' => 'addcity','uses' => 'CityesController@addcity']);
Route::post('addlengvich', ['as' => 'addlengvich','uses' => 'CityesController@addlengvich']);
Route::get('listcity', ['as' => 'listcity','uses' => 'CityesController@listcity']);
Route::get('listleng', ['as' => 'listleng','uses' => 'CityesController@listleng']);




