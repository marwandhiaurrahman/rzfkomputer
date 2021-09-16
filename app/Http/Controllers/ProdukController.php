<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::latest()->get();
        return view('admin.produk.index', compact('produks'))->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::latest()->get();
        return view('admin.produk.create', compact('kategoris'));
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
            'ringkasan' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required',
            'diskon' => 'min:0|max:100',
        ]);

        Produk::updateOrCreate($request->only(['name', 'ringkasan', 'harga', 'stok', 'kategori_id', 'diskon', 'publish']));
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $kategoris = Produk::latest()->get();
        return view('admin.produk.edit', compact('produk', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {

        request()->validate([
            'name' => 'required',
            'ringkasan' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required',
            'diskon' => 'min:0|max:100',
        ]);


        $produk->update($request->all());
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index');
    }
}
