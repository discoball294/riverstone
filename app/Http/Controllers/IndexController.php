<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Layanan;
use App\Pengumuman;
use App\Restaurant;
use App\RoomCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $banner = Banner::find(1);
        $restaurant = Restaurant::find(1);
        $layanan = Layanan::all();
        $tipe_kamar = RoomCategory::all();
        $news = Pengumuman::paginate(5);
        return \View::make('front.home', compact('banner','layanan','tipe_kamar','news','restaurant'));
    }
    public function room($room_id){
        $tipe_kamar = RoomCategory::find($room_id);
        return view('front.room',compact('tipe_kamar'));
    }
    public function adminIndex(){
        return \View::make('admin.blank');
    }

}
