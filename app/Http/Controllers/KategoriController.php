<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function index()
    {
        $kategori = Kategori::paginate(4);
        $artikel = Artikel::all();
        return view('kategori.index', compact('kategori', 'artikel'));
    }

    public function filterByCategory($id)
    {
        $kategori = Kategori::paginate(4);
        $artikel = Artikel::where('id_kategori', $id)->paginate(3);

        return view('kategori.index', compact('kategori', 'artikel'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_kategori' => 'required|unique:kategoris,nama_kategori',

        ], [
            'name_kategori.required' => 'Nama ini harus diisi',
        ]);

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;

        $kategori->save();
        return redirect()->route('kategori.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kategori' => 'required',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;

        $kategori->save();
        return redirect()->route('kategori.index');

    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        // Alert::success('Success', 'Data Ini Telah Di Hapus')->autoclose(2000);
        return redirect()->route('kategori.index');
    }
}
