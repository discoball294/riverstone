<?php

use Illuminate\Database\Seeder;

class RoomCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_category')->truncate();
        $room_category = new \App\RoomCategory();
        $room_category->nama = 'Cottage';
        $room_category->deskripsi = 'Cottage adalah kamar dengan fasilitas nomor satu';
        $room_category->gambar = 'cottage.jpg';
        $room_category->save();

        $room_category = new \App\RoomCategory();
        $room_category->nama = 'Bungalow';
        $room_category->deskripsi = 'Bungalow adalah kamar dengan fasilitas nomor satu';
        $room_category->gambar = 'bungalow.jpg';
        $room_category->save();
    }
}
