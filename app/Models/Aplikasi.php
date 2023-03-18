<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model
{
    use HasFactory;
    protected $table = 'aplikasi';
    protected $fillable = [
        'nama_aplikasi','url','user_login','password'
    ];
    protected $dates = 'updated_at';

}
