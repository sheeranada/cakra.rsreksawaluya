<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Router extends Model
{
    use HasFactory;
    protected $table = 'router';
    protected $fillable = [
        'nama_router','ip_address','user_login','password','ssid_default','ssid_password'
    ];
    protected $dates = 'updated_at';

    public function wifi()
    {
        return $this->hasMany(Wifi::class);
    }
}
