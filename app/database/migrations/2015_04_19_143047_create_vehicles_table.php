<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('make');
			$table->string('model');
			$table->string('year');
			/*$table->string('seller_email_temp')->nullable();
			$table->string('vin');
			$table->string('sid');
			$table->integer('seller_id')->nullable();
			$table->integer('created_id');
			$table->integer('updated_by')->nullable();
			$table->string('state_stage');
			$table->integer('mileage');
			$table->string('county_registered')->nullable();
			$table->string('color_exterior');
			$table->string('color_interior');
			$table->integer('spec_num_doors');
			$table->integer('spec_trans')->nullable();
			$table->integer('spec_num_cylinders')->nullable();
			$table->string('negotiable_ind')->nullable();
			$table->dateTime('public_at')->nullable();
			$table->integer('num_views')->nullable();
			$table->string('cert_badge_1')->nullable();
			$table->string('state_status')->default('ENABLED');*/

			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicles');
	}

}
