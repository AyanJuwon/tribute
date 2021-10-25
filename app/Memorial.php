<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Carbon;
use App\Tribute;

class Memorial extends Model
{
    use Sluggable;

    protected $fillable = ['first_name', 'last_name', 'gender', 'relationship', 'passed_away_date', 'born_date', 'picture', 'created_by', 'music', 'slug', 'main_section_text', 'personal_phrase', 'death_state','death_country', 'birth_country', 'birth_state', 'life','plan_type', 'expiry_date', 'page_views', 'active'];

    protected $dates = ['passed_away_date', 'born_date', 'expiry_date'];
    /**
     * @var mixed
     */
    private $users;

    public function users(){
        return $this->belongsTo(User::class, 'created_by');
    }


    public function stories(){
        return $this->hasMany(Memorial::class, 'slug');
    }

    public function tribute(){
        return $this->hasMany(Memorial::class, 'slug');
    }

    public static function countUserMemorials(){
        return self::where('created_by', auth()->user()->id)->count();
    }

    public static function countMostViewedMemorial(){
        return self::where('active',true)->where('page_views', self::max('page_views'))->count();
    }


    public static function getInitials($stringName){
     $names = explode(" ", $stringName);
            $first_name = $names[0];
            $last_name = $names[1];

        $fr = strtoupper($first_name);
        $ln = strtoupper($last_name);
        $initials = $fr[0].$ln[0];
    return $initials;
}
    public function payment(){
        return $this->hasOne(Payment::class, 'memorial_id');
    }

    public static function fullname($mem){
        return $mem->first_name  . ' ' .  $mem->last_name;
    }


    public static function memorialTributeCount($slug){

        return getTributebySlug($slug);
    }
    public static function memorialCount(){
        return Memorial::all()->count();
    }

    public static function userMemorialCount(){
        return Memorial::where('created_by', auth()->user()->id)->count();
    }

    public static function activeUserMemorialCount(){
        return Memorial::where('created_by', auth()->user()->id)->where('active', true)->count();
    }

    public static function activeUserMemorial(){
        if (Memorial::where('created_by', auth()->user()->id)->where('active', true)->where('expiry_date','>',Carbon::now()->addDays(10)))
    {
        return 1;
    } elseif(Memorial::where('created_by', auth()->user()->id)->where('active', true)->whereBetween('expiry_date', [Carbon::now(), Carbon::now()->addDays(10)])){
        return 2;
    }
    else{
        return 3;
    }
    }

  public static function expiringSoon(){
        return Memorial::where('created_by', auth()->user()->id)->whereBetween('expiry_date', [Carbon::now(), Carbon::now()->addDays(10)])->count();
    }


    public static function expired(){
        return Memorial::where('created_by', auth()->user()->id)->where('expiry_date', '<=', Carbon::now())->count();
    }

    public static function expiredMemorial(){
        if(Memorial::where('created_by', auth()->user()->id)->where('expiry_date', '<=', Carbon::now())){
            return true;
        }

    }

    public static function viewCount(){
        return Memorial::all()->sum('page_views');
    }

    public static function lcount(){
        return Memorial::where('plan_type', 'lifetime')->count();
    }

    public static function ycount(){
        return Memorial::where('plan_type', 'yearly')->count();
    }

    public static function mcount(){
        return Memorial::where('plan_type', 'monthly')->count();
    }

    public static function fcount(){
        return Memorial::where('plan_type', 'free')->count();
    }

    public static function suspendedMemorials(){
        return Memorial::where('active', false)->count();
    }

//    public static function fetchFourMemorials(){
//        return self::orderBy('created_at', 'desc')->where('active', true)->take(4)->count();
//    }
//
//    public static function fetchMemorial(){
//        if(self::fetchFourMemorials() % 2 == 0){
//            return self::orderBy('created_at', 'desc')->where('active', true)->take(4)->get();
//        }
//
//        return self::orderBy('created_at', 'desc')->where('active', true)->take(2)->get();
//    }


    public function sluggable(): array
    {
        // TODO: Implement sluggable() method.
        return [
            'slug' => [
                'source' => ['first_name', 'last_name'],
                'separator' => '-'
            ]
        ];
    }
}