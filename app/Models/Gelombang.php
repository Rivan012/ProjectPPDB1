<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gelombang extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = [
        'gelombang_buka',
        'gelombang_tutup',
    ];
    
}
