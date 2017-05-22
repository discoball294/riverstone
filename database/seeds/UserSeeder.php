<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->nama = 'Bryan Asa Kristian';
        $user->email = 'bryan.kristian478@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
    }
}
