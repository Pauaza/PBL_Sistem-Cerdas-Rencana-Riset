<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'id_dosen';

    public $timestamps = false;

    protected $fillable = [
        'nama_dosen',
        'id_lab'
    ];

    //  Relasi ke lab
    public function lab()
    {
        return $this->belongsTo(Lab_Dosen::class, 'id_lab');
    }

    //  Relasi ke penelitian
    public function penelitian()
    {
        return $this->hasMany(PenelitianDosen::class, 'nidn');
    }

    //  Relasi ke skripsi (pembimbing 1)
    public function skripsiPembimbing1()
    {
        return $this->hasMany(SkripsiAlumni::class, 'id_pembimbing_1');
    }

    //  Relasi ke skripsi (pembimbing 2)
    public function skripsiPembimbing2()
    {
        return $this->hasMany(SkripsiAlumni::class, 'id_pembimbing_2');
    }
}
