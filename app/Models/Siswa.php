<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'jenis_kelamin',
        'email',
        'foto',
        'about'
    ];
    protected $table ='siswa';
    // public function kontak(){
    //     return $this->hasMany('App\Models\Siswa', 'id_siswa');
    // }

    public function kontak(){
        return $this->hasMany('App\Models\Kontak', 'siswa_id','id');
    }

    public function projek(){
        return $this->hasMany('App\Models\Projek', 'siswa_id','id');
    }
}
