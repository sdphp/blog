<?php

class Blog_Create_Posts_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table){
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('title');
			$table->string('slug')->unique();
			$table->text('body');
			$table->integer('author_id')->unsigned();
			$table->timestamps();
			$table->foreign('author_id')->references('id')->on('users');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('posts', function($table){
			$table->drop_foreign('posts_author_id_foreign');
			$table->drop();
		});
	}

}