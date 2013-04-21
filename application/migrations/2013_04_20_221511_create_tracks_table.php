<?php

class Create_Tracks_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tracks', function ($table)
		{
			$table->increments('id');
			$table->integer('library_id');
			$table->integer('soundcloud_id');
			$table->string('title');
			$table->string('uri');
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
		Schema::drop('tracks');
	}

}