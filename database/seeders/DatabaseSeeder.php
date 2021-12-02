<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id_level' => 1,
            'foto' => '',
            'nama' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('nyongkode'),
            'email' => '',
        ]);
    }
}
