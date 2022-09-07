<?php

if (!function_exists('generateId')) {
	function generateId()
	{
		return md5(uniqid('', true));
	}
}


if (!function_exists('show_403')) {
	function show_403()
	{
		return show_error('Your authorization failed. Please try refreshing the page and fill in the correct login details.', 401, 'Unauthorized');
	}
}
