<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use App\GambarKamar;
use App\RoomCategory;
use Illuminate\Http\Request;

class RoomCategoryController extends Controller
{
    public function index()
    {
        $room_categories = RoomCategory::paginate(10);
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
            'fasilitas' => 'required'
        ]);
        if ($validator->passes()) {
            $room_category = new RoomCategory();
            $room_category->nama = $request['nama'];
            $room_category->deskripsi = $request['deskripsi'];
            $room_category->harga = $request['harga'];
            $room_category->max_person = $request['max_person'];
            $save = $room_category->save();
            if ($request->hasFile('gambar')) {
                $files = $request->gambar;
                foreach ($files as $file) {
                    $path = $file->store('images', 'public');
                    $gambar = new GambarKamar();
                    $gambar->alt = 'Gambar';
                    $gambar->url = $path;
                    $gambar->kategori()->associate($room_category);
                    $gambar->save();
                }
            }
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
            'fasilitas' => 'required'
        ]);
        if ($validator->passes()) {
            $room_category = RoomCategory::find($id);
            if ($request->hasFile('gambar')) {
                $files = $request->gambar;
                $room_category->gambar()->delete();
                foreach ($files as $file) {
                    $path = $file->store('images', 'public');
                    $gambar = new GambarKamar();
                    $gambar->alt = 'Gambar';
                    $gambar->url = $path;
                    $gambar->kategori()->associate($room_category);
                    $gambar->save();
                }
            }
            $room_category->nama = $request['nama'];
            $room_category->deskripsi = $request['deskripsi'];
            $room_category->harga = $request['harga'];
            $room_category->max_person = $request['max_person'];
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
        $room_categories->gambar()->delete();
        $room_categories->fasilitas()->detach();
        if ($room_categories->delete()) {
            $request->session()->flash('alert-success', 'Barang telah dihapus');
            return redirect()->back();
        } else {
            $request->session()->flash('alert-warning', 'Barang gagal dihapus');
            return redirect()->back();
        }
    }
}
