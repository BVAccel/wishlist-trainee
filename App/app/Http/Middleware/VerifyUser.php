<?php
namespace App\Http\Middleware;
use App\User;
use Closure;
use Webpatser\Uuid\Uuid;

class VerifyUser {
	public function handle($request, Closure $next) {
		if( $request->hasCookie( 'wishlistToken' ) ) {
			return $next( $request );
		}
		else {
			$user = User::create([
				'remember_token' => Uuid::generate(4),
			]);
			$response = $next( $request );
			return $response->withCookie(cookie()->forever('wishlistToken', $user->remember_token));
		}
	}
}