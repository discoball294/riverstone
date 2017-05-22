<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Layanan;
use App\Pengumuman;
use App\RoomCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $banner = Banner::find(1);
        $layanan = Layanan::all();
        $tipe_kamar = RoomCategory::all();
        $news = Pengumuman::paginate(5);
        return \View::make('front.home', compact('banner','layanan','tipe_kamar','news'));
    }
    public function adminIndex(){
        return \View::make('admin.blank');
    }
}
