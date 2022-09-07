<?php
if (!function_exists('isLogin')) {
    function isLogin()
    {
        $ci = &get_instance();
        return $ci->auth_model->has_login();
    }
}
if (!function_exists('shouldBeLogin')) {
    function shouldBeLogin()
    {
        if (!isLogin()) {
            return redirect('/login');
        }
    }
}
if (!function_exists('generateId')) {
    function generateId()
    {
        return md5(uniqid('', true));
    }
}
