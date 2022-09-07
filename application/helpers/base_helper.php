<?php

if (!function_exists('generateId')) {
    function generateId()
    {
        return md5(uniqid('', true));
    }
}
