<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komputer extends Model
{
    use HasFactory;
    protected $table = 'komputer';
    protected $fillable = [
        'area_id','nama_komputer','jenis','ip_address','user_login','password','prosesor','ram','mobo','os'
    ];
    protected $dates = 'updated_at';

    public function area()
    {
        return $this->belongsTo(Area::class,'area_id');
    }
}
