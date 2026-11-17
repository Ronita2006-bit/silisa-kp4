<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisLimbah extends Model
{
    protected $table = 'jenis_limbah';

    protected $fillable = [
        'nama',
        'satuan',
        'persen_acuan',
        'kapasitas',
        'harga_default',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];
}