<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomCategory;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = \DB::table('room')
            ->join('room_category', 'room.room_category_id', '=', 'room_category.id')
            ->select('room.*', 'room_category.nama')->orderBy('room.id','asc')
            ->paginate(5);
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
            'room_category' => 'required',
            'harga' => 'required|max:12'
        ]);
        if ($validator->passes()) {
            $room = new Room();
            $room->room_category_id = $request['room_category'];
            $room->harga = $request['harga'];
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
        return \View::make('admin.room.edit', compact('rooms','room_category'));
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'room_category' => 'required',
            'harga' => 'required|max:12'
        ]);
        if ($validator->passes()) {
            $room = Room::find($id);
            $room->room_category_id = $request['room_category'];
            $room->harga = $request['harga'];
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
}
