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
		$vehicles = DB::table('vehicles')
					->join('accounts', 'vehicles.seller_id', '=', 'accounts.id')
					->where('vehicles.make','=',Vehicle::where('id',Input::get('make'))->first()->make)
					->where('vehicles.model','=',Vehicle::where('id',Input::get('model'))->first()->model)
					->where('vehicles.year','=',Input::get('year'))
					->where('accounts.zip','=',Input::get('zip'))
					->where('vehicles.STATE_STATUS','=','ENABLED')
					->where('accounts.STATE_STATUS','=','ENABLED')
					->select('vehicles.make', 'vehicles.model', 'vehicles.year')
					->get();
		//dd(Input::get('make'));
		return View::make('vehicles.getVehicles')
					->with('vehicles',$vehicles);
	}

}
