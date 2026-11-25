<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LimbahHarian extends Model
{
    protected $table = 'limbah_harian';

    protected $fillable = ['tanggal', 'jenis_limbah_id', 'jumlah'];

    protected $casts = ['tanggal' => 'date'];

    public function jenisLimbah()
    {
        return $this->belongsTo(JenisLimbah::class);
    }
}