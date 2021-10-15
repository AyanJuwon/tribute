<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Life extends Model
{
    protected $fillable = ['life', 'user_id', 'slug'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function life(){
        return $this->belongsTo(Memorial::class);
    }

    public static function getLife ($slug){
        return Life::where('slug', $slug)->firstOrFail();
    }
}