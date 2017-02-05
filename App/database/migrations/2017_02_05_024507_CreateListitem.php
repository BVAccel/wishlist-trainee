<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListitem extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'list_items' , function( Blueprint $table ) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer( 'user_id' );
			$table->string( 'list_id' );
			$table->string( 'product_id', 32 );
			$table->string( 'variant_id', 32 );
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'list_items' );
	}
}
