<?php

namespace App\Services;

/**
 * Class UserService
 *
 * @author Danyal AB <mig@danyal.dk>
 * @package App\Services
 */
class UserService
{
	/**
	 * Unauthorized response
	 *
	 * @param null $message
	 * @return \Illuminate\Http\JsonResponse
	 */
	public static function unauthorizedResponse($message = null) {
		return response()->json([
			'status' => false,
			'message' => $message ? $message : 'Unauthorized, Nip atau Password salah!'
		], '401');
	}
}