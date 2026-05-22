<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mahasiswa extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Insert data ke tabel mahasiswa
        DB::table('mahasiswa')->insert([
            'nim' => '123123',
            'nama' => 'bey',
            'jurusan' => 'Teknik Informatika',
            'created_at' => now(),
            'updated_at' => now(),       
            
        ]);
        \App\Models\Mahasiswa::factory(50)->create();
    }
}