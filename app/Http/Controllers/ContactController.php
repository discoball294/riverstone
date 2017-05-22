<?php

namespace App\Http\Controllers;

use App\Contact;
use App\TipeContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $contact = DB::table('contacts')
            ->join('tipe_contact', 'contacts.tipe_contact_id', '=', 'tipe_contact.id')
            ->select('contacts.*', 'tipe_contact.tipe')
            ->paginate(5);
        return \View::make('admin.contact.index', compact('contact'));
    }

    public function create()
    {
        $tipe_contact = TipeContact::all();
        return \View::make('admin.contact.create', compact('tipe_contact'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'tipe_contact_id' => 'required',
            'content' => 'required|max:255',
        ]);
        if ($validator->passes()){
            $contact = new Contact();
            $contact->fill($request->all());
            $save = $contact->save();
            if ($save) {
                $request->session()->flash('alert-success', 'Contact telah ditambahkan');
                return redirect()->back();
            } else {
                $request->session()->flash('alert-warning', 'Contact gagal ditambahkan');
                return redirect()->back();
            }
        }
        else {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }

    }

    public function edit($id){
        $tipe_contact = TipeContact::all();
        $contact = Contact::find($id);
        return \View::make('admin.contact.edit',compact('contact','tipe_contact'));
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'tipe_contact_id' => 'required',
            'content' => 'required|max:255',
        ]);
        if ($validator->passes()){
            $contact = Contact::find($id);
            $contact->fill($request->all());
            $save = $contact->save();
            if ($save) {
                $request->session()->flash('alert-success', 'Contact telah diubah');
                return redirect()->back();
            } else {
                $request->session()->flash('alert-warning', 'Contact gagal diubah');
                return redirect()->back();
            }
        }else {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }

    }

    public function destroy(Request $request, $id)
    {
        $contact = Contact::find($id);
        if ($contact->delete()) {
            $request->session()->flash('alert-success', 'Contact telah dihapus');
            return redirect()->back();
        } else {
            $request->session()->flash('alert-warning', 'Contact gagal dihapus');
            return redirect()->back();
        }

    }
}
