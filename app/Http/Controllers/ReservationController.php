<?php

namespace App\Http\Controllers;

use App\DetailReservasi;
use App\Mail\RoomFailToReservedMail;
use App\Mail\RoomReservedMail;
use App\Reservasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReservationController extends Controller
{
    public function reservation(Request $request)
    {
        try {
            $messages = [
                'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
                'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
            ];
            $validator = \Validator::make($request->all(), [
                'nama' => 'required',
                'email' => 'required',
                'telepon' => 'required',
                'book[]' => 'reqired',
                'g-recaptcha-response' => 'required|captcha'
            ], $messages);
            if ($validator->passes()) {
                $data = [];
                $counter = 0;
                $total = 0;
                $check_in = Carbon::createFromFormat('Y-m-d', $request['tanggal_check_in']);
                $check_out = Carbon::createFromFormat('Y-m-d', $request['tanggal_check_out']);
                $stay_length = $check_in->diffInDays($check_out);
                foreach ($request->book as $id) {
                    $data[$id] = ['harga' => $request['hidden_price'][$counter], 'subtotal' => $request['hidden_price'][$counter] * $stay_length, 'check_in' => $request['tanggal_check_in'], 'check_out' => $request['tanggal_check_out']];
                    $total += $request['hidden_price'][$counter] * $stay_length;
                    $counter++;
                }
                //dd($data);
                $reservation = new Reservasi();
                $reservation->nama = $request['nama'];
                $reservation->email = $request['email'];
                $reservation->no_telp = $request['telepon'];
                $reservation->status = 0;
                $reservation->total = $total;
                $reservation->promo_id = 1;
                $save = $reservation->save();
                $reservation->roomReservation()->sync($data);
                $book_id = $reservation->id;
                if ($save) {
                    $request->session()->flash('alert-success', 'Tipe Ruang telah ditambahkan');
                    return redirect()->route('summary', compact('book_id'));
                } else {
                    $request->session()->flash('alert-warning', 'Tipe Ruang gagal ditambahkan');
                    return view('front.home');
                }
            } else {
                return redirect()->back()->withErrors($validator)->withInput($request->input());
            }
        } catch (\Exception $exception) {
            return view('front.error')->withErrors(['error' => $exception->getMessage()]);
        }

    }

    public function bookingSummary($book_id)
    {
        $summary = Reservasi::find($book_id);
        $unik = 0;
        switch (strlen($book_id)) {
            case 1 :
                $unik = '00' . $book_id;
                break;
            case 2 :
                $unik = '0' . $book_id;
                break;
            case 3 :
                $unik = '' . $book_id;
                break;
            default :
                $unik = substr($book_id, -3);
        }

        if ($summary) {
            return view('front.summary', compact('book_id', 'summary', 'unik'));
        } else {
            return abort(404, 'Book ID ' . $book_id . ' Not Found');
        }
    }

    public function sendConfirmation(Request $request)
    {
        $reservasi = Reservasi::find($request->id);
        $reservasi->transfer_to = $request->bank;
        $reservasi->promo_id = $request->reward;
        $reservasi->total = $request->total;
        $reservasi->save();
        return view('front.confirmation');
    }

    public function adminReservationIndex()
    {
        $reservasi = Reservasi::whereRaw('created_at >= SUBDATE(TIMESTAMP(NOW()),INTERVAL 24 HOUR)')->where('status', '=', 0)->paginate(20, ['*'], 'new');
        $reservasi_expired = Reservasi::whereRaw('created_at <= SUBDATE(TIMESTAMP(NOW()),INTERVAL 24 HOUR)')->where('status', '=', 0)->orWhere('status', '=', 2)->paginate(20, ['*'], 'expired');
        $reservasi_completed = Reservasi::where('status', '=', 1)->paginate(20, ['*'], 'completed');
        return view('admin.reservasi.index', compact('reservasi', 'reservasi_expired', 'reservasi_completed'));
    }

    public function adminReservationDetail($reservasi_id)
    {
        $reservasi = Reservasi::find($reservasi_id);
        $unik = 0;
        switch (strlen($reservasi_id)) {
            case 1 :
                $unik = '00' . $reservasi_id;
                break;
            case 2 :
                $unik = '0' . $reservasi_id;
                break;
            case 3 :
                $unik = '' . $reservasi_id;
                break;
            default :
                $unik = substr($reservasi_id, -3);
        }
        return view('admin.reservasi.detail', compact('reservasi', 'unik'));
    }

    public function paymentConfirmation(Request $request)
    {
        $reservasi = Reservasi::find($request->id);
        try {
            if ($request->btn == 'Confirm Payment') {
                $confirm_reservation = new RoomReservedMail($reservasi);
                $confirm_reservation->setUnik($request->unik);
                \Mail::to($reservasi->email)->send($confirm_reservation);
                $reservasi->status = 1;
                $reservasi->save();
            } else {
                $confirm_reservation = new RoomFailToReservedMail($reservasi);
                $confirm_reservation->setUnik($request->unik);
                \Mail::to($reservasi->email)->send($confirm_reservation);
                $reservasi->status = 2;
                $reservasi->save();

            }
            return redirect()->back();
        } catch (\Exception $exception) {
            return view('admin.error');
        }
        return redirect()->back();
    }

    public function changeDate(Request $request)
    {
        $date = DetailReservasi::where('reservasi_id', '=', $request->reservasi_id)
            ->where('room_id', '=', $request->room_id)
            ->update([
                'check_in' => $request->checkin,
                'check_out' => $request->checkout,
                'subtotal' => $request->subtotal
            ]);
        if ($date) {
            return redirect()->back();
        } else {
            $request->session()->flash('alert-warning', 'Gagal');
            return redirect()->back();
        }

    }

    public function reservationDT($status)
    {
        if ($status == 0)
            $reservasi = Reservasi::whereRaw('created_at >= SUBDATE(TIMESTAMP(NOW()),INTERVAL 24 HOUR)')->where('status', '=', 0);
        elseif ($status == 1)
            $reservasi = Reservasi::where('status', '=', 1);
        else
            $reservasi = Reservasi::whereRaw('created_at <= SUBDATE(TIMESTAMP(NOW()),INTERVAL 24 HOUR)')->where('status', '=', 0)->orWhere('status', '=', 2)->orWhere('status', '=', 3);

        return DataTables::of($reservasi)
            ->addColumn('action', function ($res) {
                return '<a type="button" href="' . route('detail-reservasi', ['reservasi_id' => $res->id]) . '" class="btn btn-outline blue btn-xs btn-delete"><i class="fa fa-info"></i> Details </a>';
            })
            ->editColumn('created_at', function ($res) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $res->created_at)->toFormattedDateString();
            })
            ->editColumn('status', function ($res) {

                if ($res->status == 0)
                    $status = '<span class="label label-sm label-warning"> Not Confirmed </span>';
                elseif ($res->status == 1)
                    $status = '<span class="label label-sm label-success"> Confirmed </span>';
                elseif ($res->status == 3)
                    $status = '<span class="label label-sm label-danger"> Canceled by User </span>';
                else
                    $status = '<span class="label label-sm label-danger"> Canceled </span>';
                return $status;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function findReservation(Request $request){
        $reservasi = Reservasi::with('roomReservation.roomType')->findOrFail($request->id);
        return $reservasi->toJson();
    }

    public function cancelByUser(Request $request){
        $reservasi = Reservasi::find($request->id);
        $reservasi->status = 3;
        $reservasi->save();
        return redirect()->back();
    }

}
