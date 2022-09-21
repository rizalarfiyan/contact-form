<?php

if (!function_exists('generateId')) {
	function generateId()
	{
		return md5(uniqid('', true));
	}
}

if (!function_exists('getGravatar')) {
	function getGravatar($email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = [])
	{
		$url = 'https://www.gravatar.com/avatar/';
		$url .= md5(strtolower(trim($email)));
		$url .= "?s=$s&d=$d&r=$r";
		if ($img) {
			$url = '<img src="' . $url . '"';
			foreach ($atts as $key => $val)
				$url .= ' ' . $key . '="' . $val . '"';
			$url .= ' />';
		}
		return $url;
	}
}

if (!function_exists('show_403')) {
	function show_403()
	{
		return show_error('Your authorization failed. Please try refreshing the page and fill in the correct login details.', 401, 'Unauthorized');
	}
}

if (!function_exists('encryptDecrypt')) {
	function encryptDecrypt($string, $isEncrypt = false)
	{
		$output = false;
		$method = 'AES-256-CBC';
		$secretKey = '4TvS01g5989s5b^O0S7vc9s&Vg6%foxBljRp@oW@G^1sc*pui7';
		$secretIv = 's5!B41T6sJ8i9Mot9@6l^HfyY*k*8s%J@howtgwYFg6iT^6Sfu';
	
		$key = hash('sha256', $secretKey);
		$iv = substr(hash('sha256', $secretIv), 0, 16);
		if ($isEncrypt) {
			$output = openssl_encrypt($string, $method, $key, 0, $iv);
			return base64_encode($output);
		}
		return openssl_decrypt(base64_decode($string), $method, $key, 0, $iv);
	}
}
