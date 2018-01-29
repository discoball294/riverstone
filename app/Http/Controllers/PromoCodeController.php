<?php

namespace App\Http\Controllers;

use App\Promocode;
use Gabievi\Promocodes\Exceptions\InvalidPromocodeExceprion;
use Gabievi\Promocodes\Promocodes;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kode_promo = Promocode::paginate(10);
        return view('admin.promocodes.index', compact('kode_promo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promocodes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kode_promo = new Promocodes();
        $kode_promo->createCodeName($request->promo_code,$request->reward/100,$request->expires);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkCode(Request $request){
        $kode_promo = new Promocodes();
        try{
        $kode_promo = $kode_promo->check($request->code);
        $promo_id = $kode_promo->id;
        }catch (InvalidPromocodeExceprion $exception) {
            $request->session()->flash('danger','Kode Promo Tidak ada');
            return redirect()->back();
        }
        if (!$kode_promo){
            $request->session()->flash('danger','Kode Promo Tidak berlaku');
            return redirect()->back();
        }
        $request->session()->flash('success','Anda mendapatkan potongan harga sebesar '. $kode_promo->reward*100 .'%');
        $request->session()->flash('promo_id',$promo_id);
        $request->session()->flash('reward',$kode_promo->reward);
        return redirect()->back()->with('promo_id',$promo_id);

    }
}
