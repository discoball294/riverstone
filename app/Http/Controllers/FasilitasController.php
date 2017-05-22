<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index(){
        $fasilitas = Fasilitas::paginate(10);
        return \View::make('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create(){
        return view('admin.fasilitas.create');

    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'fasilitas' => 'required|max:100',
        ]);
        if ($validator->passes()) {
            $fasilitas = new Fasilitas();
            $fasilitas->fill($request->all());
            if ($fasilitas->save()) {
                $request->session()->flash('alert-success', 'Fasilitas telah ditambahkan');
                return redirect()->back();
            } else {
                $request->session()->flash('alert-warning', 'Fasilitas gagal ditambahkan');
                return redirect()->back();
            }
        }
        else {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }

    }

    public function edit($id)
    {
        $fasilitas = Fasilitas::find($id);
        return \View::make('admin.fasilitas.edit',compact('fasilitas'));

    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'fasilitas' => 'required|max:100',
        ]);
        if ($validator->passes()) {
            $fasilitas = Fasilitas::find($id);
            $fasilitas->fill($request->all());
            if ($fasilitas->save()) {
                $request->session()->flash('alert-success', 'Fasilitas telah diubah');
                return redirect()->back();
            } else {
                $request->session()->flash('alert-warning', 'Fasilitas gagal diubah');
                return redirect()->back();
            }
        }
        else {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }

    }

    public function destroy(Request $request, $id)
    {
        $fasilitas = Fasilitas::find($id);
        if ($fasilitas->delete()) {
            $request->session()->flash('alert-success', 'Fasilitas telah dihapus');
            return redirect()->back();
        } else {
            $request->session()->flash('alert-warning', 'Fasilitas gagal dihapus');
            return redirect()->back();
        }

    }


}
