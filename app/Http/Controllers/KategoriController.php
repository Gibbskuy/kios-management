<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menampilkan semua kategori dan artikel
    public function index()
    {
        $kategori = Kategori::paginate(4);
        $artikel = Artikel::all();

        return view('kategori.index', compact('kategori', 'artikel'));
    }

    // Menampilkan artikel berdasarkan kategori tertentu
    public function filterByCategory($id)
    {
        $kategori = Kategori::paginate(4);
        $artikel = Artikel::where('id_kategori', $id)->paginate(3);

        return view('kategori.index', compact('kategori', 'artikel'));
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        return view('kategori.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|unique:kategoris,nama_kategori',
        ], [
            'nama_kategori.required' => 'Nama kategori harus diisi',
            'nama_kategori.unique' => 'Nama kategori sudah digunakan',
        ]);

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->route('kategori.index');
    }

    // Tidak digunakan, tapi bisa disiapkan untuk masa depan
    public function show($id)
    {
        //
    }

    // Menampilkan form edit kategori
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('kategori.edit', compact('kategori'));
    }

    // Memperbarui data kategori
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama kategori harus diisi',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->route('kategori.index');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index');
    }
}
