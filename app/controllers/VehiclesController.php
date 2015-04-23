<?php

class VehiclesController extends \BaseController {

	public function index(){

		$data = Vehicle::orderBy('make', 'asc')->groupBy('make')->lists('make', 'id');
		return View::make('vehicles.index')
					->with('vehicles',Vehicle::all())
					->with('make',$data);
	}

	public function search(){
		return View::make('vehicles.search')
					->with('make',Vehicle::lists('make', 'id'));
	}

	public function doSearch(){
		//return Input::all();
		$vehicles = DB::table('vehicle')
					->join('accounts', 'vehicle.seller_id', '=', 'accounts.id')
					->where('vehicle.make','=',Vehicle::where('id',Input::get('make'))->first()->make)
					->where('vehicle.model','=',Vehicle::where('id',Input::get('model'))->first()->model)
					->where('vehicle.year','=',Input::get('year'))
					->where('accounts.zip','=',Input::get('zip'))
					->where('vehicle.STATE_STATUS','=','ENABLED')
					->where('accounts.STATE_STATUS','=','ENABLED')
					->select('vehicle.make', 'vehicle.model', 'vehicle.year')
					->get();
		//dd(Input::get('make'));
		return View::make('vehicles.getVehicles')
					->with('vehicles',$vehicles);
	}

}
