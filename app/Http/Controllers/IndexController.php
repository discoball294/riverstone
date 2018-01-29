<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Contact;
use App\Layanan;
use App\Pengumuman;
use App\Reservasi;
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
        $news = Pengumuman::where('tanggal','>', Carbon::now()->format('Y-m-d'))->paginate(5);
        $alamat = Contact::all();
        return \View::make('front.home', compact('banner','layanan','tipe_kamar','news','restaurant','alamat'));
    }
    public function room($room_id){
        $tipe_kamar = RoomCategory::find($room_id);
        return view('front.room',compact('tipe_kamar'));
    }
    public function adminIndex(){
        $total_revenue = Reservasi::where('status','=',1)->get()->sum('total');
        if ($total_revenue < 1000000) {
            $n_format = number_format($total_revenue);
            $prefix = 'Ribu';
        } else if ($total_revenue < 1000000000) {
            $n_format = number_format($total_revenue / 1000000, 3);
            $prefix = 'Juta';
        } else {
            $n_format = number_format($total_revenue / 1000000000, 3) . 'Miliar';
            $prefix = 'Miliar';
        }
        $booking_count = Reservasi::count('id');
        $completed_booking = Reservasi::where('status','=',1)->get()->count();
        $canceled_booking = Reservasi::where('status','=',2)->get()->count();
        $chart_monthly_revenue = Reservasi::selectRaw('SUM(total) as value, DATE(created_at) as date')->groupBy(DB::raw('DATE(created_at)'))->get()->jsonSerialize();
        $chart = Reservasi::selectRaw('DATE_FORMAT(created_at, "%M") AS Month, SUM(total) AS Total')->where('status','=',1)->orWhereBetween('created_at',[date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s').'-12 months')),date('Y-m-d H:i:s')])->groupBy(DB::raw('DATE_FORMAT(created_at, "%M")'))->get();
        $chart_monthly_book = Reservasi::selectRaw('DATE_FORMAT(created_at, "%M") AS Month, count(id) AS Total')->where('status','=',1)->groupBy(DB::raw('DATE_FORMAT(created_at, "%M")'))->get()->jsonSerialize();
        //dd($chart_monthly_revenue);
        return \View::make('admin.blank',compact('n_format', 'prefix','booking_count','completed_booking','chart_monthly_revenue','chart_monthly_book','canceled_booking'));
    }

}
