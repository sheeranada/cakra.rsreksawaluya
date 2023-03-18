<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pma extends Model
{
    use HasFactory;
    protected $table = 'pma';
    protected $fillable = [
        'server_id','user_login','password'
    ];
    protected $dates = 'updated_at';

    public function server()
    {
        return $this->belongsTo(Server::class, 'server_id');
    }
}
