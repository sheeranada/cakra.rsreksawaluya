<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'unit';
    protected $fillable = [
        'nama_unit'
    ];
    protected $dates = 'updated_at';

    public function area()
    {
        return $this->hasMany(Area::class);
    }
}
