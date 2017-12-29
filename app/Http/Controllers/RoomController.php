<?php

namespace App\Http\Controllers;

use App\DetailReservasi;
use App\Room;
use App\RoomCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = \DB::table('room')
            ->join('room_category', 'room.room_category_id', '=', 'room_category.id')
            ->select('room.*', 'room_category.nama')->orderBy('room.id', 'asc')
            ->paginate(10);
        //dd($rooms);
        return \View::make('admin.room.index', compact('rooms'));
    }

    public function create()
    {
        $room_category = RoomCategory::all();
        return view('admin.room.create', compact('room_category'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'room_category' => 'required'
        ]);
        if ($validator->passes()) {
            $room = new Room();
            $room->room_category_id = $request['room_category'];
            if ($room->save()) {
                $request->session()->flash('alert-success', 'Kamar telah ditambahkan');
                return redirect()->back();
            } else {
                $request->session()->flash('alert-warning', 'Kamar gagal ditambahkan');
                return redirect()->back();
            }

        } else {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }

    }

    public function edit($id)
    {
        $rooms = Room::find($id);
        $room_category = RoomCategory::all();
        return \View::make('admin.room.edit', compact('rooms', 'room_category'));
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'room_category' => 'required'
        ]);
        if ($validator->passes()) {
            $room = Room::find($id);
            $room->room_category_id = $request['room_category'];
            $room->max_person = $request['max_person'];
            if ($room->save()) {
                $request->session()->flash('alert-success', 'Kamar telah disimpan');
                return redirect()->back();
            } else {
                $request->session()->flash('alert-warning', 'Kamar gagal disimpan');
                return redirect()->back();
            }

        } else {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }
    }

    public function destroy(Request $request, $id)
    {
        $room = Room::find($id);
        if ($room->delete()) {
            $request->session()->flash('alert-success', 'Barang telah dihapus');
            return redirect()->back();
        } else {
            $request->session()->flash('alert-warning', 'Barang gagal dihapus');
            return redirect()->back();
        }
    }

    public function availableRooms(Request $request)
    {
        $messages = [
            'hidden_checkin_submit.before' => 'Tanggal check out harus setelah tanggal check in'
        ];
        $validator = \Validator::make($request->all(), [
            'jumlah_ruang' => 'required',
            'jumlah_orang' => 'required',
            'hidden_checkin_submit' => 'required|before:hidden_checkout_submit',
            'hidden_checkout_submit' => 'required'
        ], $messages);
        if ($validator->passes()) {
            $check_in = Carbon::createFromFormat('Y-m-d', $request['hidden_checkin_submit']);
            $check_out = Carbon::createFromFormat('Y-m-d', $request['hidden_checkout_submit']);
            $send_checkin = $request['hidden_checkin_submit'];
            $send_checkout = $request['hidden_checkout_submit'];
            $jumlah_ruang = $request['jumlah_ruang'];
            $jumlah_orang = $request['jumlah_orang'];
            $available_rooms =
                Room::whereHas('roomType', function ($query) use ($jumlah_orang) {
                    $query->where('max_person', '>=', $jumlah_orang);
                })->whereNotIn('room.id',function ($query) use ($check_in, $check_out) {
                    $query->select('room_id')->from('detail_reservasi')->where('check_in','<=',$check_out)->where('check_out','>=',$check_in)->distinct();
                })->get()
                /*DB::table('room')
                ->select('room.id AS room_id', 'room_category.*')
                ->leftJoin('detail_reservasi', 'detail_reservasi.room_id', '=', 'room.id')
                ->leftJoin('room_category', 'room.room_category_id', '=', 'room_category.id')
                ->whereNull('detail_reservasi.id')
                ->orWhere(function ($query) use ($check_in, $check_out) {
                    $query->where('detail_reservasi.check_out', '>=', $check_in)
                        ->where('detail_reservasi.check_in', '>=', $check_out);
                })
                ->orWhere(function ($query) use ($check_in, $check_out) {
                    $query->where('detail_reservasi.check_out', '<=', $check_in)
                        ->where('detail_reservasi.check_out', '<=', $check_out);
                })->distinct()->get()*/;
            //dd($available_rooms);

            return view('front.search-room', compact('available_rooms', 'send_checkin', 'send_checkout', 'jumlah_orang', 'jumlah_ruang'));
        }
        else {
        return redirect()->back()->withErrors($validator)->withInput($request->input());
    }
    }
    public function availableChangeDate(Request $request){
        $check_in = Carbon::createFromFormat('Y-m-d', $request['hidden_checkin_submit']);
        $check_out = Carbon::createFromFormat('Y-m-d', $request['hidden_checkout_submit']);
        $room_id = $request->room_id;
        $available = DetailReservasi::select(['check_in','check_out'])->where('room_id','=', $room_id)->distinct()->get();
        $disabled_checkin = array();
        foreach ($available as $item){
            array_push($disabled_checkin,$item->check_in,$item->check_out);
        }
        return \GuzzleHttp\json_encode($disabled_checkin);
    }

}
