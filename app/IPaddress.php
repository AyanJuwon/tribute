<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IPaddress extends Model
{
    protected $fillable = ['ip_address', 'slug'];
}
