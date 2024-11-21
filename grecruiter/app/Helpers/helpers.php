<?php

use App\Models\Apply;
use Facades\App\Ultilities\MyColor;
use Illuminate\Support\Facades\Auth;
if (!function_exists('random_color')) {
    function random_color()
    {
        $new = MyColor::random_color();
        return $new;
    }
}