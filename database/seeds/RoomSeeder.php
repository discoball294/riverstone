<?php

use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room')->truncate();
        $room = new \App\Room();
        $room->room_category_id = 1;
        $room->harga = 200000;
        $room->save();

        DB::table('room')->truncate();
        $room = new \App\Room();
        $room->room_category_id = 2;
        $room->harga = 300000;
        $room->save();
    }
}
