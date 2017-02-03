<?php
namespace App\Http\Middleware;
use Closure;
class VerifyUser {
	public function handle($request, Closure $next) {
		return $next($request);
	}
}