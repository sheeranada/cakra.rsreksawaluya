<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = 'area';
    protected $fillable = [
        'unit_id','nama_area'
    ];
    protected $dates = 'updated_at';


    public function task()
    {
        return $this->hasMany(Task::class);
    }

    public function komputer()
    {
        return $this->hasMany(Komputer::class);
    }
    public function wifi()
    {
        return $this->hasMany(Wifi::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
