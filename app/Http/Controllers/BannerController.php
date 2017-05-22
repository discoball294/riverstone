<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function edit($id)
    {
        $banner = Banner::find($id);
        return \View::make('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'text' => 'required|max:255',
            'gambar' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        if ($validator->passes()) {
            $banner = Banner::find($id);
            if ($request->hasFile('gambar')) {
                \File::delete($request['old_gambar']);
                $path = $request->gambar->store('images', 'public');
                $banner->gambar = $path;
            }
            $banner->text = $request['text'];
            $save = $banner->save();
            if ($save) {
                $request->session()->flash('alert-success', 'Banner telah disimpan');
                return redirect()->back();
            } else {
                $request->session()->flash('alert-warning', 'Banner gagal disimpan');
                return redirect()->back();
            }
        } else {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }
    }
}
