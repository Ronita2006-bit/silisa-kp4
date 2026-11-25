<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $akun = [
            ['name' => 'Admin SiLiSa',    'email' => 'admin@silisa.test',    'peran' => 'admin'],
            ['name' => 'Manajer SiLiSa',  'email' => 'manajer@silisa.test',  'peran' => 'manajer'],
            ['name' => 'Operator SiLiSa', 'email' => 'operator@silisa.test', 'peran' => 'operator'],
        ];

        foreach ($akun as $a) {
            User::updateOrCreate(
                ['email' => $a['email']],
                $a + ['password' => 'password', 'status' => 'aktif']
            );
        }
    }
}