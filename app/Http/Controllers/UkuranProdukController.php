<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\UkuranProduk;
use Illuminate\Http\Request;

class UkuranProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Produk $produk)
    {
        $ukurans = UkuranProduk::where('produk_id', $produk->id)->get();
        return view('admin.produk.ukuran', compact('produk', 'ukurans'))->with('i', 0);
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

        UkuranProduk::updateOrCreate($request->only(['name', 'produk_id',]));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UkuranProduk  $ukuranProduk
     * @return \Illuminate\Http\Response
     */
    public function show(UkuranProduk $ukuranProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UkuranProduk  $ukuranProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(UkuranProduk $ukuranProduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UkuranProduk  $ukuranProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UkuranProduk $ukuranProduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UkuranProduk  $ukuranProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy($ukuranProduk)
    {
        UkuranProduk::findOrFail($ukuranProduk)->delete();
        return back();
    }
}
