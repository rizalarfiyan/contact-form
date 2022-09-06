<?php
if (!function_exists('isLogin')) {
    function isLogin()
    {
        $ci = &get_instance();
        return $ci->auth_model->current_user();
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
