<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
			{
			    $table->increments('id');
			    $table->string('username');
			    $table->string('soundcloud_id');
			    $table->string('souncloud_token');
			    $table->string('souncloud_refresh');
			    $table->integer('souncloud_expiration');
			    $table->timestamps();
			});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}