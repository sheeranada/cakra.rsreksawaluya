<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wifi extends Model
{
    use HasFactory;
    protected $table = 'wifi';
    protected $fillable = [
        'area_id','router_id','ip_address','ssid','password','dhcp'
    ];
    protected $dates = 'updated_at';

    public function router()
    {
        return $this->belongsTo(Router::class, 'router_id');
    }
    public function area()
    {
        return $this->belongsTo(Area::class,'area_id');
    }
}
