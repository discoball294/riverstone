<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$this->call(RoomSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoomCategoriesSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(PengumumanSeeder::class);
        $this->call(FasilitasSeeder::class);
        $this->call(TipeContactSeeder::class);
        $this->call(ContactSeeder::class);
        */
        $this->call(ReservationSeeder::class);

    }
}
