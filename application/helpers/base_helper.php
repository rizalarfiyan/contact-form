<?php
if (!function_exists('isLogin')) {
    function isLogin()
    {
		$ci =& get_instance();
        return $ci->auth_model->current_user();
    }
}
