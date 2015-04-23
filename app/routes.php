<?php

Route::get('/',function(){
	return Redirect::route('vehicle.index');

});
Route::get('vehicles', ['as' => 'vehicle.index', 'uses' => 'VehiclesController@index']);
Route::get('vehicle', ['as' => 'vehicle.search', 'uses' => 'VehiclesController@search']);
Route::post('vehicle', ['as' => 'vehicle.doSearch', 'uses' => 'VehiclesController@doSearch']);

Route::get('api/dropdown', function(){
	$input = Input::get('id');

	$make = Vehicle::where('id',$input)->first()->make;


	$maker = Vehicle::where('make',$make)->lists('id','model');


	return Response::json($maker);
});

Route::get('test',function(){
	return DB::table('vehicle')
				->join('accounts', 'vehicle.seller_id', '=', 'accounts.id')
//				->where('vehicle.make','=','Mercedes-Benz')
//				->where('vehicle.model','=','V1')
				->where('vehicle.STATE_STATUS','=','ENABLED')
				->where('accounts.STATE_STATUS','=','ENABLED')
				->select('vehicle.make', 'vehicle.model', 'vehicle.year')
				->get();

});