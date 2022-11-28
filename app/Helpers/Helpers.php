<?php


use Illuminate\Support\Carbon;

if (!function_exists('settings')) {
    function settings($key, $default=null){
        return \App\Models\Settings::getByKey($key, $default);
    }
}

if (!function_exists('dateFormat')){
    function dateFormat($value){
        return \Carbon\Carbon::parse($value)->format('d F, Y');
    }
}

if (!function_exists('slug') ) {
    function slug($val) {
        $slug = preg_replace('/\s+/u', '-', trim($val));
        return $slug;
    }
}

if (!function_exists('get_path') ) {
    function get_path($value) {
        return \Illuminate\Support\Facades\Storage::disk('public')->url($value);
    }
}


if (!function_exists('short_text') ) {
    function short_text($string, $length = 50) {
        return Illuminate\Support\Str::limit($string, $length);
    }
}


if (!function_exists('short_desc') ) {
    function short_desc($string, $length = 200) {
        return Illuminate\Support\Str::limit($string, $length);
    }
}

if (!function_exists('diffForHumans') ) {
    function diffForHumans($date) {
        Carbon::setLocale(config('app.locale'));
        return Carbon::parse($date)->diffForHumans();
    }
}

if (!function_exists('showDateTime') ) {
    function showDateTime($date, $format = 'Y-m-d h:i A'){
        Carbon::setlocale(config('app.locale'));
        return Carbon::parse($date)->translatedFormat($format);
    }
}
