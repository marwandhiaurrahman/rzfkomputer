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
        $gambars = GambarProduk::where('produk_id', $produk->id)->get();
        return view('admin.produk.gambar', compact('produk', 'gambars'))->with('i', 0);
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
    public function store(Request $request, Produk $produk)
    {
        $request->validate([
            'name' => 'required',
            'produk_id' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty($request->gambar)) {
            $imageName = $request->gambar->getClientOriginalName();
            $request->gambar->move(public_path('storage/produk-image'), $imageName);
        }
        $input = $request->all();
        $input['gambar'] = $imageName;

        GambarProduk::create($input);

        return redirect()->route('gambar.index', compact('produk'));
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
    public function destroy(Produk $produk, $gambarProduk)
    {
        GambarProduk::find($gambarProduk)->delete();
        return back();
    }
}
