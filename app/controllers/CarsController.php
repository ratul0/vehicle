<?php

class CarsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /cars
	 *
	 * @return Response
	 */
	public function index()
	{

		return Response::json(Vehicle::all());
	}


}