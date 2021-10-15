<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActiviesLog extends Model
{
    protected $fillable = ['description', 'subject_type', 'subject_id', 'causer_type', 'causer_id', 'slug','active'];

    public function users(){
        return $this->belongsTo(User::class, 'causer_id');
    }

    public static function countActivity($slug){
        return ActiviesLog::where('slug', $slug)->where('active', true)->count();
    }
}
