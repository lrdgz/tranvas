<?php

use Illuminate\Support\Str;
if (!function_exists('limit_words')){


    function limit_words($string, $words = 100, $end = '...'){
        return Str::words($string, $words, $end);
    }


}
