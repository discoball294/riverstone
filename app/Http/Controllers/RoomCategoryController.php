<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use App\RoomCategory;
use Illuminate\Http\Request;

class RoomCategoryController extends Controller
{
    public function index()
    {
        $room_categories = RoomCategory::paginate(5);
        return \View::make('admin.room-categories.index', compact('room_categories'));
    }

    public function create()
    {
        $fasilitas = Fasilitas::all();
        return \View::make('admin.room-categories.create', compact('fasilitas'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nama' => 'required|max:100',
            'deskripsi' => 'required|max:255',
            'fasilitas' => 'required',
            'gambar' => 'required|mimes:jpeg,bmp,png'
        ]);
        if ($validator->passes()) {
            $path = $request->gambar->store('images','public');
            $room_category = new RoomCategory();
            $room_category->nama = $request['nama'];
            $room_category->deskripsi = $request['deskripsi'];
            $room_category->gambar = $path;
            $save = $room_category->save();
            $room_category->fasilitas()->sync($request->get('fasilitas'));
            if ($save) {
                $request->session()->flash('alert-success', 'Tipe Ruang telah ditambahkan');
                return redirect()->back();
            } else {
                    $request->session()->flash('alert-warning', 'Tipe Ruang gagal ditambahkan');
                return redirect()->back();
            }
        } else {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }
    }

    public function edit($id)
    {
        $room_categories = RoomCategory::find($id);
        $fasilitas = Fasilitas::all();
        $fasilitas_ruangan = $room_categories->fasilitas->keyBy('id');
        return \View::make('admin.room-categories.edit', compact('room_categories', 'fasilitas', 'fasilitas_ruangan'));
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'nama' => 'required|max:100',
            'deskripsi' => 'required|max:255',
            'fasilitas' => 'required',
            'gambar' => 'mimes:jpeg,bmp,png'
        ]);
        if ($validator->passes()) {
            $room_category = RoomCategory::find($id);
            if ($request->hasFile('gambar')){
                \File::delete($request['old_gambar']);
                $path = $request->gambar->store('images','public');
                $room_category->gambar = $path;
            }
            $room_category->nama = $request['nama'];
            $room_category->deskripsi = $request['deskripsi'];
            $save = $room_category->save();
            $room_category->fasilitas()->sync($request->get('fasilitas'));
            if ($save) {
                $request->session()->flash('alert-success', 'Tipe Ruang telah diubah');
                return redirect()->back();
            } else {
                $request->session()->flash('alert-warning', 'Tipe Ruang gagal diubah');
                return redirect()->back();
            }
        } else {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }

    }

    public function destroy(Request $request, $id)
    {
        $room_categories = RoomCategory::find($id);
        if ($room_categories->delete()) {
            $request->session()->flash('alert-success', 'Barang telah dihapus');
            return redirect()->back();
        } else {
            $request->session()->flash('alert-warning', 'Barang gagal dihapus');
            return redirect()->back();
        }
    }
}
