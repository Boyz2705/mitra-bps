<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data kecamatan di Surabaya
        $kecamatans = [
            ['nama_kecamatan' => 'Asemrowo'],
            ['nama_kecamatan' => 'Benowo'],
            ['nama_kecamatan' => 'Bubutan'],
            ['nama_kecamatan' => 'Bulak'],
            ['nama_kecamatan' => 'Dukuh Pakis'],
            ['nama_kecamatan' => 'Gayungan'],
            ['nama_kecamatan' => 'Genteng'],
            ['nama_kecamatan' => 'Gubeng'],
            ['nama_kecamatan' => 'Gunung Anyar'],
            ['nama_kecamatan' => 'Jambangan'],
            ['nama_kecamatan' => 'Karangpilang'],
            ['nama_kecamatan' => 'Kenjeran'],
            ['nama_kecamatan' => 'Krembangan'],
            ['nama_kecamatan' => 'Lakarsantri'],
            ['nama_kecamatan' => 'Mulyorejo'],
            ['nama_kecamatan' => 'Pabean Cantikan'],
            ['nama_kecamatan' => 'Pakal'],
            ['nama_kecamatan' => 'Rungkut'],
            ['nama_kecamatan' => 'Sambikerep'],
            ['nama_kecamatan' => 'Sawahan'],
            ['nama_kecamatan' => 'Semampir'],
            ['nama_kecamatan' => 'Simokerto'],
            ['nama_kecamatan' => 'Sukolilo'],
            ['nama_kecamatan' => 'Sukomanunggal'],
            ['nama_kecamatan' => 'Tambaksari'],
            ['nama_kecamatan' => 'Tandes'],
            ['nama_kecamatan' => 'Tegalsari'],
            ['nama_kecamatan' => 'Tenggilis Mejoyo'],
            ['nama_kecamatan' => 'Wiyung'],
            ['nama_kecamatan' => 'Wonokromo'],
            ['nama_kecamatan' => 'Wonocolo'],
        ];

        // Insert ke tabel kecamatans
        DB::table('kecamatans')->insert($kecamatans);
    }
}
