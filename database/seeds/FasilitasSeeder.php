<?php

use Illuminate\Database\Seeder;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*$fasilitas = new \App\Fasilitas();
        $fasilitas->fasilitas = 'LED TV';
        $fasilitas->save();

        $fasilitas = new \App\Fasilitas();
        $fasilitas->fasilitas = 'AC';
        $fasilitas->save();

        $fasilitas = new \App\Fasilitas();
        $fasilitas->fasilitas = 'Wi-Fi';
        $fasilitas->save();

        $fasilitas = new \App\Fasilitas();
        $fasilitas->fasilitas = 'Kamar Mandi';
        $fasilitas->save();*/

        $fasilitas_ruangan = new \App\FasilitasRuangan();
        $fasilitas_ruangan->room_category_id = 1;
        $fasilitas_ruangan->fasilitas_id = 1;
        $fasilitas_ruangan->save();

        $fasilitas_ruangan = new \App\FasilitasRuangan();
        $fasilitas_ruangan->room_category_id = 1;
        $fasilitas_ruangan->fasilitas_id = 2;
        $fasilitas_ruangan->save();

        $fasilitas_ruangan = new \App\FasilitasRuangan();
        $fasilitas_ruangan->room_category_id = 1;
        $fasilitas_ruangan->fasilitas_id = 3;
        $fasilitas_ruangan->save();
    }
}
