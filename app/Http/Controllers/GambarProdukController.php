<?php

namespace App\Http\Controllers;

use App\Models\GambarProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class GambarProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Produk $produk)
    {
        // dd($produk);
        return view('admin.produk.gambar',compact('produk'));
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
            'gambar' => 'required|max:2048',
        ]);

        $imageName = time().'.'.$request->gambar->getClientOriginalExtension();

        $request->gambar->move(public_path('images/produk'), $imageName);


        dd($request->input());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GambarProduk  $gambarProduk
     * @return \Illuminate\Http\Response
     */
    public function show(GambarProduk $gambarProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GambarProduk  $gambarProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(GambarProduk $gambarProduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GambarProduk  $gambarProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GambarProduk $gambarProduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GambarProduk  $gambarProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(GambarProduk $gambarProduk)
    {
        //
    }
}
