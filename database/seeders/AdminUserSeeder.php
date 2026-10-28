<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            [
                'email' => 'admin@rivolt.test',
            ],
            [
                'name' => 'RIVOLT Admin',
                'password' => Hash::make('RivoltAdmin123!'),
            ]
        );

        // Tetapkan role secara eksplisit, bukan dari input pengguna.
        $admin->forceFill([
            'name' => 'RIVOLT Admin',
            'role' => 'admin',
        ])->save();
    }
}