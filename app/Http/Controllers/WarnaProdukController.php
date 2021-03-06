<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\WarnaProduk;
use Illuminate\Http\Request;

class WarnaProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Produk $produk)
    {
        $warnas = WarnaProduk::where('produk_id', $produk->id)->get();
        return view('admin.produk.warna', compact('produk', 'warnas'))->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'produk_id' => 'required',
        ]);

        WarnaProduk::updateOrCreate($request->only(['name', 'produk_id',]));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WarnaProduk  $warnaProduk
     * @return \Illuminate\Http\Response
     */
    public function show(WarnaProduk $warnaProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WarnaProduk  $warnaProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(WarnaProduk $warnaProduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WarnaProduk  $warnaProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarnaProduk $warnaProduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WarnaProduk  $warnaProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk, $warnaProduk)
    {
        $warnaProduk = WarnaProduk::findOrFail($warnaProduk);
        $warnaProduk->delete();
        return back();
    }
}
