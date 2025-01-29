<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resep extends Model
{
    protected $table = 'resep';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_resep',
        'gambar',
        'deskripsi',
        'bahan_bahan',
        'bumbu_halus',
        'cara_masak',
    ];
    
    }

