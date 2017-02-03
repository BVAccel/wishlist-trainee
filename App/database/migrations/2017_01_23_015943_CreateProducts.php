<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'products' , function( Blueprint $table ) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer( 'user_id' );
			$table->integer( 'list_id' );
			$table->bigInteger( 'product_id' )->nullable();
			$table->bigInteger( 'variant_id' )->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'products' );
	}
}
