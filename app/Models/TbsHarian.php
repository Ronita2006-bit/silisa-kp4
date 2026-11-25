<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbsHarian extends Model
{
    protected $table = 'tbs_harian';

    protected $fillable = ['tanggal', 'jumlah'];

    protected $casts = ['tanggal' => 'date'];
}