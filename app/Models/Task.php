<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'task';
    protected $fillable = [
        'area_id','tanggal','problem','solving','mulai','selesai'
    ];
    protected $dates = 'updated_at';

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
