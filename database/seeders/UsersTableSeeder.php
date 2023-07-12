<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Admin
            [
                'name' => 'Admin',
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'Admin',
            ],

            //Kepala Ruang
            [
                'name' => 'Kepala Ruang',
                'username' => 'Kepala Ruang',
                'email' => 'kepalaruang@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'kepala ruang',
            ],

            //Manajer
            [
                'name' => 'Manajer',
                'username' => 'Manajer',
                'email' => 'manajer@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'manajer',
            ],

            //Direktur
            [
                'name' => 'Direktur',
                'username' => 'Direktur',
                'email' => 'direktur@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'direktur',
            ],

            //Pegawai
            [
                'name' => 'Pegawai',
                'username' => 'Pegawai',
                'email' => 'pegawai@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'pegawai',
            ],

            //HRD
            [
                'name' => 'HRD',
                'username' => 'HRD',
                'email' => 'hrd@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'hrd',
            ],


        ]);
    }
}
