<?php

namespace App\Http\Middleware;

use Closure;

class VerifyHMAC {
	public function handle($request, Closure $next) {
		if (!$this->verifyShopifySignature($request)) {
			//return response("",401);
		}
		return $next($request);
	}
	private function verifyShopifySignature($request) {
		return ($request->header('x-Wishlist-Signature') == $this->calculateHmac());
	}
	private function calculateHmac() {
		$data = file_get_contents('php://input');
		return base64_encode(hash_hmac('sha256', $data, env('APP_KEY'), true));
	}
}