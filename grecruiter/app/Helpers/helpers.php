<?php

use App\Models\Apply;
use App\Models\Esport;
use App\Models\Position;
use App\Models\Rank;
use Facades\App\Ultilities\MyColor;
use Illuminate\Support\Facades\Auth;
if (!function_exists('random_color')) {
    function random_color()
    {
        $new = MyColor::random_color();
        return $new;
    }
}


if (!function_exists('get_all_esports')) {
    function get_all_esports()
    {
        return Esport::all();
    }
}


if (!function_exists('get_all_positions')) {
    function get_all_positions()
    {
        return Position::all();
    }
}

if (!function_exists('get_all_ranks')) {
    function get_all_ranks()
    {
        return Rank::all();
    }
}