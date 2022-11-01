<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projek extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'nama_projek',
        'tanggal',
        'deskripsi',
        'foto'

    ];

    protected $table ='projek';
    public function Siswa(){
        return $this->belongsTo('App\Models\Siswa', 'siswa_id');
    }
}
