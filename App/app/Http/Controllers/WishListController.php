<?php

namespace App\Http\Controllers;
use App\Lists;
use App\ListItem;
use Illuminate\Http\Request;

class WishListController extends Controller {
	public function create( Request $request ) {
		Lists::create( [
			'user_id' => session( 'wishlistUserId' ),
			'name' => $request->input( 'name' ),
		]);
	}
	public function view ( Request $request ) {
		$lists = Lists::whereUserId( session( 'wishlistUserId' ) )->get();
		return response()->json($lists->all());
	}
	public function detail ( Request $request, $id ) {
		$list = Lists::whereId( $id )->first();
		return response()->json($list);
	}
	public function addItem ( $list_id, $product_id ) {
		$result = ListItem::create( [
			'user_id' => session('wishlistUserId'),
			'list_id' => $list_id,
			'product_id' => $product_id,
		]);
		return response()->json($result);
	}
	public function addItemVariant ( $list_id, $variant_id ) {
		$result = ListItem::create( [
			'user_id' => session('wishlistUserId'),
			'list_id' => $list_id,
			'variant_id' => $variant_id,
		]);
		return response()->json($result);
	}
}
