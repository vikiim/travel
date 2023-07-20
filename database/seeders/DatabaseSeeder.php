<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('level')->insert([
            "nama_level" => "petugas"
        ]);
        DB::table('level')->insert([
            "nama_level" => "admin"
        ]);
        // DB::table('petugas')->insert([
        //     "username" => "asep",
        //     "password" => "rahasia",
        //     "nama_petugas" => "asep",
        //     "id_level" => "1"
        // ]);
        // DB::table('petugas')->insert([
        //     "username" => "admin",
        //     "password" => "admin",
        //     "nama_petugas" => "admin",
        //     "id_level" => "2"
        // ]);
    }
}
