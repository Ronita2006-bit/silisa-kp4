<?php

namespace Database\Seeders;

use App\Models\JenisLimbah;
use Illuminate\Database\Seeder;

class JenisLimbahSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Tandan Kosong (TKKS)',
                'satuan' => 'ton',
                'persen_acuan' => 23.00,
                'kapasitas' => 540.00,
                'harga_default' => 150000,
            ],
            [
                'nama' => 'Cangkang',
                'satuan' => 'ton',
                'persen_acuan' => 6.50,
                'kapasitas' => 380.00,
                'harga_default' => 800000,
            ],
            [
                'nama' => 'Serat (Fiber)',
                'satuan' => 'ton',
                'persen_acuan' => 13.00,
                'kapasitas' => 250.00,
                'harga_default' => 300000,
            ],
            [
                'nama' => 'Lumpur Sawit',
                'satuan' => 'ton',
                'persen_acuan' => 4.00,
                'kapasitas' => 160.00,
                'harga_default' => 100000,
            ],
            [
                'nama' => 'Abu Boiler',
                'satuan' => 'ton',
                'persen_acuan' => 0.50,
                'kapasitas' => 60.00,
                'harga_default' => 250000,
            ],
        ];

        foreach ($data as $item) {
            JenisLimbah::updateOrCreate(['nama' => $item['nama']], $item);
        }
    }
}