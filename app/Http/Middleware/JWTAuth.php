<?php 

namespace App\Http\Middleware;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Closure;
use Exception;

class JWTAuth {

	public function handle($request, Closure $next, $guard = null)
	{
		$token = $request->header('authorization');
		$verify = explode(" ", $token);

		if ($verify[0] !== "petani") {

			return [
				'code' => 401,
				'error' => 'Token not provided.'
			];
		}

		if (!$token) {

			return [
                'code' => 400,
                'error' => 'Provided token is expired.'
            ];
		}

		try {
			$credentials = JWT::decode($verify[1], env('JWT_SECRET'), ['HS256']);
		} catch(ExpiredException $e) {

			return [
				'code' => 400,
				'error' => 'Token is expired. '
			];
		} catch(Exception $e) {

			return [
				'code' => 400,
				'error' => 'An error while decoding token.'
			];
		}

		return $next($request);
	}
}

?>