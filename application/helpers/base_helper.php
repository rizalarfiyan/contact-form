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
