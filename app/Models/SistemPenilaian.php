<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SistemPenilaian extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $foreignKey = 'nisn';
    public function siswa(){
        return $this->belongsTo(Siswa::class, 'nisn');
    }
}

