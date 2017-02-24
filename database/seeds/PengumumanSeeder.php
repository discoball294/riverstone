<?php

use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('pengumuman')->truncate();
        $pengumuman = new \App\Pengumuman();
        $pengumuman->judul = 'Diskon Akhir Tahun';
        $pengumuman->pengumuman = 'Dapatkan Diskon Akhir Tahun dengan melakukan reservasi pada website ini';
        $pengumuman->tanggal = '2016-12-24';
        $pengumuman->status = 'Inactive';
        $pengumuman->save();

        $pengumuman = new \App\Pengumuman();
        $pengumuman->judul = 'Diskon Tahun Baru China';
        $pengumuman->pengumuman = 'Dapatkan Diskon Tahun Baru China dengan melakukan reservasi pada website ini';
        $pengumuman->tanggal = '2017-02-24';
        $pengumuman->status = 'Active';
        $pengumuman->save();

        $pengumuman = new \App\Pengumuman();
        $pengumuman->judul = 'Diskon Awal Tahun';
        $pengumuman->pengumuman = 'Dapatkan Diskon Akhir Tahun dengan melakukan reservasi pada website ini';
        $pengumuman->tanggal = '2017-01-01';
        $pengumuman->status = 'Inactive';
        $pengumuman->save();

        $pengumuman = new \App\Pengumuman();
        $pengumuman->judul = 'Diskon Akhir Tahun';
        $pengumuman->pengumuman = 'Dapatkan Diskon Akhir Tahun dengan melakukan reservasi pada website ini';
        $pengumuman->tanggal = '2016-12-24';
        $pengumuman->status = 'Inactive';
        $pengumuman->save();

        $pengumuman = new \App\Pengumuman();
        $pengumuman->judul = 'Diskon Tahun Baru China';
        $pengumuman->pengumuman = 'Dapatkan Diskon Tahun Baru China dengan melakukan reservasi pada website ini';
        $pengumuman->tanggal = '2017-02-24';
        $pengumuman->status = 'Active';
        $pengumuman->save();

        $pengumuman = new \App\Pengumuman();
        $pengumuman->judul = 'Diskon Awal Tahun';
        $pengumuman->pengumuman = 'Dapatkan Diskon Akhir Tahun dengan melakukan reservasi pada website ini';
        $pengumuman->tanggal = '2017-01-01';
        $pengumuman->status = 'Inactive';
        $pengumuman->save();
    }
}
