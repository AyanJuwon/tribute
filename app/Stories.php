<?php

namespace App;

use App\Memorial;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Stories extends Model
{
    use LogsActivity;

    protected $fillable = ['story', 'image', 'user_id', 'slug','active','isPublic'];

    protected static $logAttributes = ['story', 'from'];

    protected static $recordEvents = ['created'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function memorial(){
        return $this->belongsTo(Memorial::class,'slug');
    }

    public static function checkClose(){
        return Stories::where(auth()->user()->id, 'user_id');
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return "added a story";
    }

    public static function getStoriesWithImages(){
        return Stories::where('image', '!=', '')->count();
    }

    public static function getStoriesWithoutImages(){
        return Stories::where('image', '=', '')->count();
    }

    public static function allStories(){
        return Stories::where('active', true)->count();
    }

    public static function getStoriesbySlug($slug){
        return Stories::where('active', true)->where('slug', $slug)->count();
    }
    public static function getMemorialDetailsbySlug($slug){
        $name =  Memorial::where('active', true)->where('slug', $slug)->first();
        // $name = $name->first_name;
        return $name;
    }

    public static function countStories($slug){
        return Stories::where('active', true)->where('slug', $slug)->count();
    }

    public static function bannedStories(){
        return Stories::where('active', false)->count();
    }
}