<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRagdollGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ragdoll_groups', function($table) {
		    $table->increments('id');
		    $table->timestamps();
		    $table->string('name',255);
		});
		Schema::create('ragdoll_zones', function($table) {
		    $table->increments('id');
		    $table->timestamps();
		    $table->string('name',255);
		});
		Schema::create('ragdoll_types', function($table) {
		    $table->increments('id');
		    $table->timestamps();
		    $table->string('name',255);
		    $table->integer('order');
		});
		Schema::create('ragdoll_postcodes', function($table) {
		    $table->increments('id');
		    $table->timestamps();
		    $table->string('code',2);
		});
		Schema::create('ragdoll_group_ragdoll_zone', function($table) {
		    $table->increments('id');
		    $table->timestamps();
		    $table->integer('ragdoll_group_id');
		    $table->integer('ragdoll_zone_id');
		});
		Schema::create('ragdoll_postcode_ragdoll_zone', function($table) {
		    $table->increments('id');
		    $table->timestamps();
		    $table->integer('ragdoll_postcode_id');
		    $table->integer('ragdoll_zone_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ragdoll_groups');
		Schema::drop('ragdoll_zones');
		Schema::drop('ragdoll_types');
		Schema::drop('ragdoll_postcodes');
		Schema::drop('ragdoll_group_ragdoll_zone');
		Schema::drop('ragdoll_postcode_ragdoll_zone');
	}

}
