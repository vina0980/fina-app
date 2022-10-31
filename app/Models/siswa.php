<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'jk',
        'email',
        'foto',
        'about'
    ];
    protected $table = 'siswa';
    public function contact(){
        return $this->hasMany( contact::class , 'id');
    }

    public function project(){
        return $this->hasMany( project::class , 'id_siswa');
    }
}
