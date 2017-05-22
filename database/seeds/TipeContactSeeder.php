<?php

use Illuminate\Database\Seeder;

class TipeContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipe_contact = new \App\TipeContact();
        $tipe_contact->tipe = 'Telepon';
        $tipe_contact->save();

        $tipe_contact = new \App\TipeContact();
        $tipe_contact->tipe = 'Email';
        $tipe_contact->save();

        $tipe_contact = new \App\TipeContact();
        $tipe_contact->tipe = 'Fax';
        $tipe_contact->save();

        $tipe_contact = new \App\TipeContact();
        $tipe_contact->tipe = 'Facebook';
        $tipe_contact->save();

        $tipe_contact = new \App\TipeContact();
        $tipe_contact->tipe = 'Twitter';
        $tipe_contact->save();
    }
}
