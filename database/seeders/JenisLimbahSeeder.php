<?php

namespace Database\Seeders;

use App\Models\JenisLimbah;
use Illuminate\Database\Seeder;

class JenisLimbahSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // ['nama' => '...', 'satuan' => 'ton', 'persen_acuan' => 0, 'kapasitas' => 0, 'harga_default' => null],
        ];

        foreach ($data as $item) {
            JenisLimbah::updateOrCreate(['nama' => $item['nama']], $item);
        }
    }
}