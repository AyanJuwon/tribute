<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddImages extends Model
{
    protected $fillable = ['image', 'slug', 'user_id','active'];

    public static function imageCount(){
        return AddImages::where('active', true)->count();
    }

    public static function bannedImages(){
        return AddImages::where('active', false)->count();
    }

    public static function imagecountUI($slug){
        return AddImages::where('slug', $slug)->where('active', true)->count();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
