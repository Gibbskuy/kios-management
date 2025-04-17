<?php
namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller {
    
    public function index() {
        $kategori = Kategori::paginate( 4 );
        $artikel  = Artikel::where( 'status', 'approved' )->paginate( 3 );

        return view( 'kategori.index', compact( 'kategori', 'artikel' ) );
    }

    public function filter( $nama_kategori ) {
        $kategori = Kategori::all();
        $kategoriDipilih = Kategori::where( 'nama_kategori', $nama_kategori )->firstOrFail();

        $artikel = Artikel::where( 'id_kategori', $kategoriDipilih->id )
        ->orderBy( 'created_at', 'desc' )
        ->get();

        return view( 'kategori.index', compact( 'kategori', 'artikel' ) );
    }

    public function create() {
        return view( 'kategori.create' );
    }

    public function store( Request $request ) {
        $this->validate( $request, [
            'nama_kategori' => 'required|unique:kategoris,nama_kategori',
        ], [
            'nama_kategori.required' => 'Nama kategori harus diisi',
            'nama_kategori.unique'   => 'Nama kategori sudah digunakan',
        ] );

        $kategori                = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->route( 'kategori.index' );
    }

    public function show( $id ) {
        //
    }

    public function edit( $id ) {
        $kategori = Kategori::findOrFail( $id );

        return view( 'kategori.edit', compact( 'kategori' ) );
    }

    // Memperbarui data kategori

    public function update( Request $request, $id ) {
        $this->validate( $request, [
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama kategori harus diisi',
        ] );

        $kategori                = Kategori::findOrFail( $id );
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->route( 'kategori.index' );
    }

    public function destroy( $id ) {
        $kategori = Kategori::findOrFail( $id );
        $kategori->delete();

        return redirect()->route( 'kategori.index' );
    }
}
