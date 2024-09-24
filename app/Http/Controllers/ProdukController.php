<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori ;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function index()
    {
        $kategori = Kategori::all();
        $produk = Produk::all();
        return view('produk.index', compact('produk', 'kategori'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $produk = Produk::all();
        return view('produk.create', compact('kategori', 'produk'));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_produk' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'id_kategori' => 'required',

        ]);

        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->stok = $request->stok;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->id_kategori = $request->id_kategori;

        $produk->save();
        return redirect()->route('produk.index')
        ->with('Berhasil', 'Produk Berhasil dibuat.');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_produk' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'id_kategori' => 'required',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->stok = $request->stok;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->id_kategori = $request->id_kategori;

        $produk->save();
        return redirect()->route('produk.index');

    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        // Alert::success('Success', 'Data Ini Telah Di Hapus')->autoclose(2000);
        return redirect()->route('produk.index')
        ->with('Berhasil', 'Produk Berhasil dihapus');
    }
}
