<?php

class VehiclesController extends \BaseController {

	public function index(){
		return View::make('vehicles.index')
					->with('vehicles',Vehicle::all());
	}

	public function search(){
		return View::make('vehicles.search')
					->with('make',Vehicle::lists('make', 'id'));
	}

	public function doSearch(){
		//return Input::all();
		$vehicles = Vehicle::where('id',Input::get('model'))
					->get();
		return View::make('vehicles.getVehicles')
					->with('vehicles',$vehicles);
	}

}
