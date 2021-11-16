<?php 

namespace App;
use App\Models\User;

class JWT {
	public static function generate_jwt($headers, $payload, $secret = 'secret') {
		$headers_encoded = JWT::base64url_encode(json_encode($headers));
		
		$payload_encoded = JWT::base64url_encode(json_encode($payload));
		
		$signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
		$signature_encoded = JWT::base64url_encode($signature);
		
		$jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
		
		setcookie('token', $jwt, time() + (86400 * 30), "/");
		return true;
	}

	public static function login(User $user, array $credentials)
    {
        $verified = password_verify($credentials['password'], $user->password);
        if ($verified) {
            JWT::generate_jwt('{"alg": "SHA256","typ": "JWT"}', array('id' => $user->id));
        }
        return $verified;
    }
    
    private static function base64url_encode($str) {
        return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
    }

	public static function isLogin() {
        if(!isset($_COOKIE['token'])) return FALSE;
        $jwt = $_COOKIE['token']; 
        $secret = 'secret';
		// split the jwt
		$tokenParts = explode('.', $jwt);
		$header = base64_decode($tokenParts[0]);
		$payload = base64_decode($tokenParts[1]);
		$signature_provided = $tokenParts[2];

		// build a signature based on the header and payload using the secret
		$base64_url_header = JWT::base64url_encode($header);
		$base64_url_payload = JWT::base64url_encode($payload);
		$signature = hash_hmac('SHA256', $base64_url_header . "." . $base64_url_payload, $secret, true);
		$base64_url_signature = JWT::base64url_encode($signature);

		// verify it matches the signature provided in the jwt
		$is_signature_valid = ($base64_url_signature === $signature_provided);
		
		if (!$is_signature_valid) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public static function get_data($jwt){
		$tokenParts = explode('.', $jwt);
		$payload = base64_decode($tokenParts[1]);
		return $payload;
	}

}
