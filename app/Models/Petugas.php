<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas';

    protected $fillable = [
        'username',
        'password',
        'nama_petugas',
        'id_level'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
