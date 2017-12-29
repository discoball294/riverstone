<?php

namespace App\Http\Controllers;

use App\Reservasi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request){
        if ($request->has(['start','end'])){
            $reservasi = Reservasi::whereBetween('created_at',[$request->start,$request->end])->get();
        }
        else{
            $reservasi = Reservasi::whereMonth('created_at','=',Carbon::today()->month)->get();
        }

        return view('admin.laporan.index',compact('reservasi','request'));
    }
}
