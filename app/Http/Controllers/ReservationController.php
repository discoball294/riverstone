<?php

namespace App\Http\Controllers;

use App\Mail\RoomFailToReservedMail;
use App\Mail\RoomReservedMail;
use App\Reservasi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reservation(Request $request)
    {
        $data = [];
        $counter = 0;
        $check_in = Carbon::createFromFormat('Y-m-d', $request['tanggal_check_in']);
        $check_out = Carbon::createFromFormat('Y-m-d', $request['tanggal_check_out']);
        $check_in_timestamp = $check_in->timestamp;
        $check_out_timestamp = $check_out->timestamp;
        $stay_length = $check_in->diffInDays($check_out);
        foreach ($request->book as $id) {
            $data[$id] = ['harga' => $request['hidden_price'][$counter],'subtotal'=> $request['hidden_price'][$counter]*$stay_length, 'check_in' => $check_in_timestamp, 'check_out' => $check_out_timestamp];
            $counter++;
        }
        //dd($data);
        $reservation = new Reservasi();
        $reservation->nama = $request['nama'];
        $reservation->email = $request['email'];
        $reservation->no_telp = $request['telepon'];
        $reservation->status = 0;
        $save = $reservation->save();
        $reservation->roomReservation()->sync($data);
        $book_id = $reservation->id;
        if ($save) {
            $request->session()->flash('alert-success', 'Tipe Ruang telah ditambahkan');
            return redirect()->route('summary',compact('book_id'));
        } else {
            $request->session()->flash('alert-warning', 'Tipe Ruang gagal ditambahkan');
            return view('front.home');
        }
    }

    public function bookingSummary($book_id){
        $summary = Reservasi::find($book_id);
        $unik = 0;
        switch (strlen($book_id)){
            case 1 : $unik = '00'.$book_id; break;
            case 2 : $unik = '0'.$book_id; break;
            case 3 : $unik = ''.$book_id; break;
            default : $unik = substr($book_id, -3);
        }
        if ($summary){
            return view('front.summary',compact('book_id','summary','unik'));
        }else{
            return abort(404,'Book ID '.$book_id.' Not Found');
        }
    }

    public function sendConfirmation(Request $request){
        $reservasi = Reservasi::find($request->id);
        $reservasi->transfer_to = $request->bank;
        $reservasi->save();
        return view('front.confirmation');
    }

    public function adminReservationIndex(){
        $reservasi = Reservasi::paginate(10);
        return view('admin.reservasi.index', compact('reservasi'));
    }
    public function adminReservationDetail($reservasi_id){
        $reservasi = Reservasi::find($reservasi_id);
        $unik = 0;
        switch (strlen($reservasi_id)){
            case 1 : $unik = '00'.$reservasi_id; break;
            case 2 : $unik = '0'.$reservasi_id; break;
            case 3 : $unik = ''.$reservasi_id; break;
            default : $unik = substr($reservasi_id, -3);
        }
        return view('admin.reservasi.detail',compact('reservasi','unik'));
    }
    public function paymentConfirmation(Request $request){
        $reservasi = Reservasi::find($request->id);
        if ($request->btn == 'Confirm Payment'){
            $reservasi->status = 1;
            $reservasi->save();
            $confirm_reservation = new RoomReservedMail($reservasi);
            $confirm_reservation->setUnik($request->unik);
            \Mail::to($reservasi->email)->send($confirm_reservation);
        }else{
            $reservasi->status = 2;
            $reservasi->save();
            $confirm_reservation = new RoomFailToReservedMail($reservasi);
            $confirm_reservation->setUnik($request->unik);
            \Mail::to($reservasi->email)->send($confirm_reservation);
        }
        return redirect()->back();
    }

}
