<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact = new \App\Contact();
        $contact->tipe_contact_id = '1';
        $contact->content = '0341-01293912';
        $contact->save();

        $contact = new \App\Contact();
        $contact->tipe_contact_id = '2';
        $contact->content = 'info@riverstone.com';
        $contact->save();

        $contact = new \App\Contact();
        $contact->tipe_contact_id = '4';
        $contact->content = 'facebook.com/riverstone';
        $contact->save();

    }
}
