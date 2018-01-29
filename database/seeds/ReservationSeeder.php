<?php

use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $transfer = ['bca','mandiri','bni','bri'];
        $faker = Faker\Factory::create('id_ID');
        foreach (range(1,300) as $i){
            $reservasi = new \App\Reservasi();
            $reservasi->nama = $faker->name('male');
            $reservasi->email = $faker->freeEmail;
            $reservasi->no_telp = $faker->phoneNumber;
            $reservasi->status = rand(0,2);
            $reservasi->transfer_to = $transfer[rand(0,2)];
            $reservasi->total = 599000;
            $reservasi->created_at = $this->randomDate('2017-01-01 00:00:00','2017-12-31 00:00:00');
            $reservasi->save();
        }
    }

    function randomDate($sStartDate, $sEndDate, $sFormat = 'Y-m-d H:i:s')
    {
        // Convert the supplied date to timestamp
        $fMin = strtotime($sStartDate);
        $fMax = strtotime($sEndDate);
        // Generate a random number from the start and end dates
        $fVal = mt_rand($fMin, $fMax);
        // Convert back to the specified date format
        return date($sFormat, $fVal);
    }
}
