<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan pengguna dengan peran 'admin'
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Telkom Akses Kedaton',
            'email' => 'admin@telkomakses.com',
            'password' => Hash::make('admin'),
            'role' => 'admin', // Menambahkan kolom role
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Menambahkan pengguna dengan peran 'viewer'
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Telkom Viewer',
            'email' => 'viewer@telkomakses.com',
            'password' => Hash::make('viewer'),
            'role' => 'viewer', // Menambahkan kolom role
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Menambahkan pengguna dengan peran 'helpdesk'
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Telkom Helpdesk',
            'email' => 'helpdesk@telkomakses.com',
            'password' => Hash::make('helpdesk'),
            'role' => 'helpdesk', // Menambahkan kolom role
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
