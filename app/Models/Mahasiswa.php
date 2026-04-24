<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $primaryKey = 'nim';
    public $incrementing = false; // karena string

    public $timestamps = false;

    protected $fillable = [
        'nim',
        'username',
        'password'
    ];

    public function histories()
    {
        // Parameter: Class, Foreign Key di History, Local Key di Mahasiswa
        return $this->hasMany(History::class, 'nim_mahasiswa', 'nim');
    }
}

{
    return $this->hasMany(History::class);
}
