<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;
    protected $table = 'server';
    protected $fillable = [
        'nama_server','user_login','password','ip_address'
    ];
    protected $dates = 'updated_at';

    public function pma()
    {
        return $this->hasMany(Pma::class);
    }
}
