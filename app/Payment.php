<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\String\s;

class Payment extends Model
{
    protected $fillable = ['ip_address','location','slug', 'user_id','amount','reference', 'memorial_id'];

    public static function getPayment(){
        return Payment::where('user_id', auth()->user()->id)->firstOrFail();
    }

    public function memorial(){
        return $this->belongsTo(Memorial::class, 'memorial_id');
    }

    public static function countPayment(){
        return Payment::where('user_id', auth()->user()->id)->count();
    }

    public static function totalPayment(){
        return Payment::all()->sum('amount');
    }

    public function transaction($m){
        return DB::table('payments')->whereRaw('month(created_at) = ?',[$m])->sum('amount');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function dsalescount(){
        return Payment::whereDay('created_at', now()->day)->count();
    }

    public static function damount(){
        return Payment::whereDay('created_at', now()->day)->sum('amount');
    }

}