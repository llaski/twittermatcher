<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGameDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('game_data', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100)->nullable()->default(NULL);
			$table->string('screen_name', 100)->unique();
			$table->string('tweet', 255)->nullable()->default(NULL);
			$table->dateTime('tweet_time')->nullable()->default(NULL);
			$table->string('url', 255)->nullable()->default(NULL);
			$table->string('profile_img', 255)->nullable()->default(NULL);
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
		Schema::dropIfExists('game_data');
	}

}
