<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function edit($id)
    {
        $restaurant = Restaurant::find($id);
        return \View::make('admin.restaurant.edit', compact('restaurant'));
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'deskripsi' => 'required|max:1000',
            'gambar' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        if ($validator->passes()) {
            $restaurant = Restaurant::find($id);
            if ($request->hasFile('gambar')) {
                \File::delete($request['old_gambar']);
                $path = $request->gambar->store('images', 'public');
                $restaurant->gambar = $path;
            }
            $restaurant->nama = $request['nama'];
            $restaurant->deskripsi = $request['deskripsi'];
            $save = $restaurant->save();
            if ($save) {
                $request->session()->flash('alert-success', 'Restaurant telah disimpan');
                return redirect()->back();
            } else {
                $request->session()->flash('alert-warning', 'Restaurant gagal disimpan');
                return redirect()->back();
            }
        } else {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }
    }
}
