<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

class ServicesApiController extends Controller
{

    public function authorization($bearerToken) {
		$pos = strpos($bearerToken, '.');
		$token = substr($bearerToken, 0, $pos);
		// полученная подпись
		$signature = substr($bearerToken, $pos+1);
		// собственая подпись
		$signatureCreated = base64_encode(hash_hmac('sha256', $token, env('SECRET_KEY')));
		// подписи совпадают
		if ($signature === $signatureCreated){
			return true;
		} else {
			return false;
		}
	}


}
