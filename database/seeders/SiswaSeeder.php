<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder; // di import model siswa supaya bisa dipakai

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // data dummy siswa
        $siswa = [
            [
                'nisn' => '1001',
                'nama' => 'budi santoso',
                'jurusan' => 'XI RPL 1',
            ],
            [
                'nisn' => '1002',
                'nama' => 'budi santoso',
                'jurusan' => 'XI RPL 1',
            ],
        ]; // menampung data dalam bentuk array

        // memasukkan data ke dalam database
        foreach ($siswa as $s) {
            Siswa::create($s);
        }
    }
}
