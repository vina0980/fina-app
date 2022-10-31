<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_siswa',
        'id_jenis',
        'deskripsi'
    ];
    protected $table = 'contact';
    public function siswa(){
        return $this->belongsTo('app\models\siswa' , 'id_siswa');
    }
    public function jeniskontak(){
        return $this->belongsTo('app\models\jeniskontak' , 'id_jenis');
    }

}