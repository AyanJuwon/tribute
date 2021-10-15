<?php

namespace App;

use App\Notifications\PasswordReset;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Models\Activity;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','ip_address','location','isBan', 'country' , 'provider', 'provider_id', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tribute(){
        return $this->hasMany(Tribute::class);
    }

    public function stories(){
        return $this->hasMany(Stories::class);
    }

    public function activity(){
        return $this->hasMany(Activity::class);
    }

    public function isAdmin()
    {
        return $this->role == 'admin';
    }

    public static function userCount(){
        return User::where('role', 'user')->where('isBan', false)->count();
    }

    public static function bannedUsersCount(){
        return User::where('role', 'user')->where('isBan', true)->count();
    }

    public static function adminCount(){
        return User::where('role', 'admin')->count();
    }

    public static function showActivity($id){
        return User::where('id', $id)->where('role', 'admin')->first();
    }

    public static function countActivity($id){
        return User::where('id', $id)->where('role', 'admin')->count();
    }

//    public function sendPasswordResetNotification($token)
//    {
//        $this->notify(new PasswordReset($token));
//    }

}