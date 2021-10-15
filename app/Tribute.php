<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Tribute extends Model
{
    use LogsActivity;

    protected $fillable = ['tribute', 'user_id', 'docs', 'slug', 'active'];

    protected static $logAttributes = ['tribute'];

    protected static $recordEvents = ['created'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return "added a tribute";
    }

    public static function getTributeWithUploadedWithDocs(){
        return Tribute::where('docs', '!=', '')->count();
    }

    public static function getTributeTyped(){
        return Tribute::where('tribute', '!=', '')->count();
    }

    public static function allTributes(){
        return Tribute::where('active', true)->count();
    }
    // public static function userTributes($id){
    //     $slug = Memorial::where('id',$id)->get();
    //     return Tribute::where('active', true)->where('slug',$slug)->count();
    // }

    public static function bannedTributes(){
        return Tribute::where('active', false)->count();
    }

    public static function getTributebySlug($slug){
        return Tribute::where('active', true)->where('slug',$slug)->count();
    }

    public static function countTribute($slug){
        return Tribute::where('active', true)->where('slug', $slug)->count();
    }
}