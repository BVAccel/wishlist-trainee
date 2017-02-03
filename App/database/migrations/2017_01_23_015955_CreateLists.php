<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLists extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'lists' , function( Blueprint $table ) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer( 'user_id' );
			$table->string( 'name', 32 );
		});
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'lists' );
	}
}
