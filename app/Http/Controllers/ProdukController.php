<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function index()
    {
        $produk = Produk::with('kategori')->paginate(4);
        $kategori = Kategori::all();
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
            'stok' => 'required|numeric|min:1',
            'harga' => 'required|numeric|min:1',
            'deskripsi' => 'required',
            'id_kategori' => 'required',
            'foto' => 'required|max:2048|mimes:png,jpg',

        ]);

        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->stok = $request->stok;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->id_kategori = $request->id_kategori;

        if ($request->hasFile('foto')) {
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/produk/', $name);
            $produk->foto = $name;
        }

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

        if ($request->hasFile('foto')) {
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/produk/', $name);
            $produk->foto = $name;
        }

        $produk->save();
        return redirect()->route('produk.index');

    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        if ($produk->foto && file_exists(public_path ('images/produk/' . $produk->foto)))
            unlink(public_path( 'images/produk/' .$produk->foto));

        $produk->delete();
        return redirect()->route('produk.index')
            ->with('Berhasil', 'Produk Berhasil dihapus');

    }

}
