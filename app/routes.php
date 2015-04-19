<?php

Route::get('/',function(){
	return Redirect::route('vehicle.index');

});
Route::get('vehicles', ['as' => 'vehicle.index', 'uses' => 'VehiclesController@index']);
Route::get('vehicle', ['as' => 'vehicle.search', 'uses' => 'VehiclesController@search']);
Route::post('vehicle', ['as' => 'vehicle.doSearch', 'uses' => 'VehiclesController@doSearch']);

Route::get('api/dropdown', function(){
	$input = Input::get('option');

	$maker = Vehicle::where('id',$input)->lists('id','model');
	//dd($maker);
	return Response::json($maker);
});