<?php

use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $isi = ['gambar' => 'gambar.jpg', 'text' => 'Think Relaxed'];
        $banner = new \App\Banner();
        $banner->fill($isi);
        $banner->save();


    }
}
