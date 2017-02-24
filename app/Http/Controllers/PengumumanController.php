<?php

namespace App\Http\Controllers;

use App\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function getListPengumuman(){
        $pengumuman = Pengumuman::paginate(5);
        if ($pengumuman){
            return view('admin.pengumuman',[
                'pengumumans' => $pengumuman
            ]);
        }else{
            return view('admin.pengumuman', [
                'pengumumans' => 'kosong'
            ]);
        }

    }
    public function addPengumuman(Request $request){
        $validator = \Validator::make($request->all(), [
            'judul' => 'required|max:100',
            'pengumuman' => 'required|max:255',
            'tanggal' => 'required'
        ]);
        if ($validator->passes()){
            $pengumuman = new Pengumuman();
            $pengumuman->judul = $request['judul'];
            $pengumuman->pengumuman = htmlspecialchars($request['pengumuman']);
            $pengumuman->tanggal = $request['tanggal'];
            $pengumuman->status = 'active';
            if ($pengumuman->save()){
                $request->session()->flash('alert-success', 'Pengumuman telah ditambahkan');
                return redirect()->back();
            }else{
                $request->session()->flash('alert-warning', 'Barang gagal ditambahkan');
                return redirect()->back();
            }

        }else{
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }
    }

    public function editPengumuman(Request $request, $id){
        $validator = \Validator::make($request->all(), [
            'edit_judul' => 'required|max:100',
            'edit_pengumuman' => 'required|max:255',
            'edit_tanggal' => 'required',
            'edit_status' => 'required'
        ]);
        if ($validator->passes()){
            $pengumuman = Pengumuman::find($id);
            $pengumuman->judul = $request['edit_judul'];
            $pengumuman->pengumuman = htmlspecialchars($request['edit_pengumuman']);
            $pengumuman->tanggal = $request['edit_tanggal'];
            $pengumuman->status = $request['edit_status'];
            if ($pengumuman->save()){
                $request->session()->flash('alert-success', 'Pengumuman telah disimpan');
                return redirect()->back();
            }else{
                $request->session()->flash('alert-warning', 'Pengumuman gagal disimpan');
                return redirect()->back();
            }

        }else{
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }
    }

    public function deletePengumuman(Request $request, $id){
        $pengumuman = Pengumuman::find($id);
        if($pengumuman->delete()){
            $request->session()->flash('alert-success', 'Barang telah dihapus');
            return redirect()->back();
        }else {
            $request->session()->flash('alert-warning', 'Barang gagal dihapus');
            return redirect()->back();
        }
    }
}
