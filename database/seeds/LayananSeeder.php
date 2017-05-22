<?php

use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $layanan = new \App\Layanan();
        $isi = array('nama' => 'Delicious Food',
            'deskripsi' => 'Order for more than 10$ and get 15% discount through ModestMenu',
            'gambar' => 'gambar.jpg');
        $layanan->fill($isi);
        $layanan->save();

        $layanan = new \App\Layanan();
        $isi = array('nama' => 'Luxury Living',
            'deskripsi' => 'Order for more than 10$ and get 15% discount through ModestMenu',
            'gambar' => 'gambar.jpg');
        $layanan->fill($isi);
        $layanan->save();

        $layanan = new \App\Layanan();
        $isi = array('nama' => 'Spa & Beauty Care',
            'deskripsi' => 'Order for more than 10$ and get 15% discount through ModestMenu',
            'gambar' => 'gambar.jpg');
        $layanan->fill($isi);
        $layanan->save();


    }
}
