<?php

namespace App\Http\Controllers;

use App\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::paginate(5);
        return \View::make('admin.pengumuman.index', compact('pengumumans'));

    }
    public function create()
    {
        return view('admin.pengumuman.create');
    }
    public function store(Request $request){
        $validator = \Validator::make($request->all(), [
            'judul' => 'required|max:100',
            'pengumuman' => 'required|max:255',
            'tanggal' => 'required'
        ]);
        if ($validator->passes()) {
            $pengumuman = new Pengumuman();
            $pengumuman->judul = $request['judul'];
            $pengumuman->pengumuman = htmlspecialchars($request['pengumuman']);
            $pengumuman->tanggal = $request['tanggal'];
            $pengumuman->status = 'active';
            if ($pengumuman->save()) {
                $request->session()->flash('alert-success', 'Pengumuman telah ditambahkan');
                return redirect()->back();
            } else {
                $request->session()->flash('alert-warning', 'Pengumuman gagal ditambahkan');
                return redirect()->back();
            }

        } else {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }
    }
    public function edit($id){
        $pengumuman = Pengumuman::find($id);
        return \View::make('admin.pengumuman.edit', compact('pengumuman'));
    }
    public function update(Request $request, $id){
        $validator = \Validator::make($request->all(), [
            'judul' => 'required|max:100',
            'pengumuman' => 'required|max:255',
            'tanggal' => 'required',
            'edit_status' => 'required'
        ]);
        if ($validator->passes()) {
            $pengumuman = Pengumuman::find($id);
            $pengumuman->judul = $request['judul'];
            $pengumuman->pengumuman = htmlspecialchars($request['pengumuman']);
            $pengumuman->tanggal = $request['tanggal'];
            $pengumuman->status = $request['edit_status'];
            if ($pengumuman->save()) {
                $request->session()->flash('alert-success', 'Pengumuman telah disimpan');
                return redirect()->back();
            } else {
                $request->session()->flash('alert-warning', 'Pengumuman gagal disimpan');
                return redirect()->back();
            }

        } else {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }
    }

    public function destroy(Request $request, $id){
        $pengumuman = Pengumuman::find($id);
        if ($pengumuman->delete()) {
            $request->session()->flash('alert-success', 'Barang telah dihapus');
            return redirect()->back();
        } else {
            $request->session()->flash('alert-warning', 'Barang gagal dihapus');
            return redirect()->back();
        }
    }



}
