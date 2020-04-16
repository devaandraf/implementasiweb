<?php

use Illuminate\Database\Seeder;
use App\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listBarang = [ 'Meja',
                        'Papan Tulis',
                        'Meja Dosen',
                        'Remote AC',
                        'Proyektor',
                        'Kursi',
                        'Kursi Meja',
                        'Stop Kontak',
                        'Spidol',
                        'Stop Kontak',
                        'Proyektor',
                        'Remote AC',
                        'Speaker',
                        'Meja'];
        $listTotal = [ '25','1','1','1','1','15','60','3','2','5','1','1','2','40' ];
        $listRusak = [ '2' ,'0','0','0','1','1' ,'4' ,'0','0','0','0','0','1','3' ];
        $isi = 0;
        $ruangan = 1;

        foreach ($listBarang as $barang) {
        	Barang::create([
                'id_ruangan' => $ruangan++,
                'nama_barang' => $barang,
                'total' => $listTotal[$isi],
                'broken' => $listRusak[$isi++],
                'created_by' => 1,
                'updated_by' => rand(1,2)
                ]);
        }
    }
}
