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
}
