<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\ListItem;

class Lists extends Model {
	protected $guarded = [];
	protected $with = [
		'items'
	];
	public function items () {
		return $this->hasMany( 'App\ListItem', 'list_id', 'id' );
	}
}
