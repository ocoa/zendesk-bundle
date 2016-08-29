<?php

namespace ZendeskBundle\Utils;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

abstract class ControllerAbstract extends Controller
{
	/**	 
	 * 
	 * @param  mixed  $data
	 * @param  int    $httpCode
	 * @param  int    $code
	 * @param  string $message
	 * @return JsonResponse
	 */
	protected function createJsonResponse($data = null, $httpCode = 200, $code = 0, $message = null)
	{
		$response = [
			'success' => $code === 0,
			'status'  => $code
		];
		
		if ($message !== null) {
			$response['message'] = $message;
		}
		
		if ($data !== null) {
			$response['data'] = $data;
		}
		
		return new JsonResponse($response, $httpCode, [
			'Access-Control-Allow-Origin' => '*'
		]);
	}
}

