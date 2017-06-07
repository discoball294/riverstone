<?php

namespace App\Http\Controllers;

use App\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::paginate(10);
        return \View::make('admin.layanan.index', compact('layanan'));
    }

    public function create()
    {
        return \View::make('admin.layanan.create');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nama' => 'required|max:100',
            'deskripsi' => 'required|max:255',
            'gambar' => 'mimes:jpeg,bmp,png'
        ]);
        if ($validator->passes()) {
            $path = $request->gambar->store('images', 'public');
            $layanan = new Layanan();
            $layanan->fill($request->all());
            $save = $layanan->save();
            if ($save) {
                $request->session()->flash('alert-success', 'Layanan telah ditambahkan');
                return redirect()->back();
            } else {
                $request->session()->flash('alert-warning', 'Layanan gagal ditambahkan');
                return redirect()->back();
            }
        } else {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }
    }

    public function edit($id)
    {
        $layanan = Layanan::find($id);
        return \View::make('admin.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, $id)
    {

        $validator = \Validator::make($request->all(), [
            'nama' => 'required|max:100',
            'deskripsi' => 'required|max:255',
            'gambar' => 'mimes:jpeg,bmp,png'
        ]);
        if ($validator->passes()) {
            $layanan = Layanan::find($id);
            if ($request->hasFile('gambar')) {
                \File::delete($request['old_gambar']);
                $path = $request->gambar->store('images', 'public');
                $layanan->gambar = $path;
            }
            $layanan->nama = $request['nama'];
            $layanan->deskripsi = $request['deskripsi'];
            $save = $layanan->save();
            if ($save) {
            $request->session()->flash('alert-success', 'Layanan telah diubah');
            return redirect()->back();
            } else {
                $request->session()->flash('alert-warning', 'Layanan gagal diubah');
                return redirect()->back();
            }
        } else {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }

    }
}
