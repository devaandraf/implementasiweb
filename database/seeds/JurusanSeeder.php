<?php

use Illuminate\Database\Seeder;
use App\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listJurusan = ['Ilmu Hukum',
                        'Manajemen',
                        'Administrasi Pendidikan',
                        'Agribisnis',
                        'Peternakan',
                        'Arsitektur',
                        'Ilmu Gizi',
                        'Budidaya Kelautan',
                        'Kimia',
                        'Bioteknologi',
                        'Hubungan Internasional',
                        'Sastra Jepang',
                        'Pendidikan Dokter Hewan',
                        'Sistem Informasi',];
        $fakultas = 1;

        foreach ($listJurusan as $jurusan) {
        	Jurusan::create([
                'id_fakultas' => $fakultas++,
                'nama_jurusan' => $jurusan
                ]);
        }
    }
}
