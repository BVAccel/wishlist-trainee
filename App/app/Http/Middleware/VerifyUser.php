<?php
namespace App\Http\Middleware;
use App\User;
use Closure;
use Webpatser\Uuid\Uuid;
use Log;

class VerifyUser {
	public function handle($request, Closure $next) {
		if( $request->hasCookie( 'wishlistToken' ) ) {
			$user = User::whereRememberToken( $request->cookie('wishlistToken'))->first();
			if( $user ) {
				session( [ 'wishlistToken' => $request->cookie('wishlistToken') ] );
				session( [ 'wishlistUserId' => $user->id ] );
				return $next( $request );
			}
			else {
				return $this->createUser( $request, $next );
			}
		}
		else {
			return $this->createUser( $request, $next );
		}
	}
	private function createUser ( $request, Closure $next ) {
		$token = Uuid::generate( 4 );
		$user = User::create( [
			'remember_token' => $token,
		] );
		session( [ 'wishlistToken' => $token ] );
		session( [ 'wishlistUserId' => $user->id ] );
		$response = $next( $request );
		return $response->withCookie(cookie()->forever('wishlistToken', $user->getRememberToken() ));
	}
}