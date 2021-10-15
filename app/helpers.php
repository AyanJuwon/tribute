<?php
/**
 * tribute2
 * Olamiposi
 * 23/11/2020
 * 16:53
 * CREATED WITH PhpStorm
 **/

use Vinkla\Hashids\Facades\Hashids;

if(! function_exists('get_slug')){
    function get_slug(){

        if (request()->route()->parameter('slug') != ''){
           $slug = request()->route()->parameter('slug');

            return \App\Memorial::where('slug',$slug)->firstOrFail()->slug;

        }else {
            abort('404');
        }
    }
}

if (! function_exists('filter_url_id')){
    function filter_url_id($id){
        $response = 0;
        $data = Hashids::decode($id)[0];
        if (isset($data)) {
            $response = $data;
        }

        return $response;
    }
}
