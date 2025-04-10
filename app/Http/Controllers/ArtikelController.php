<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArtikelController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('permission:artikel-read', ['only' => ['index']]);
    //     $this->middleware('permission:artikel-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:artikel-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:artikel-delete', ['only' => ['destroy']]);
    // }

    public function index(Request $request)
    {
        $artikelPending = Artikel::where('status', 'pending')->paginate(10);
        $artikel        = Artikel::where('status', 'approved')->paginate(3);
        $artikelall     = Artikel::where('status', 'approved')->paginate(6);
        $artikell       = Artikel::where('status', 'rejected')->paginate(3);
        $id_kategori    = $request->input('id_kategori');
        $kategori       = Kategori::all();

        if ($id_kategori) {
            $artikel = Artikel::where('id_kategori', $id_kategori)->paginate(4);
        } else {
            $artikel = Artikel::paginate(4);
        }

        return view('artikel.index', compact(
            'artikel',
            'kategori',
            'artikelPending',
            'artikell',
            'id_kategori',
            'artikelall'
        ));

        // return response()->json([
        //     'message' => 'Data Berhasil',
        //     'data' => $artikel,
        // ], 200);
    }

    public function create()
    {
        $kategori = Kategori::all();
        $artikel  = Artikel::all(); // << ini kemungkinan bikin bingung, gak dibutuhkan di sini
        return view('artikel.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul'       => 'required',
            'deskripsi'   => 'required',
            'tanggal'     => 'required',
            'id_kategori' => 'required',
            'foto'        => 'nullable|mimes:png,jpg,webp,jpeg',
        ]);

        $slug         = Str::slug($request->judul);
        $originalSlug = $slug;
        $counter      = 1;

        // Cek apakah slug sudah ada di database
        while (Artikel::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $artikel              = new Artikel();
        $artikel->judul       = $request->judul;
        $artikel->slug        = $slug;
        $artikel->deskripsi   = $request->deskripsi;
        $artikel->tanggal     = $request->tanggal;
        $artikel->id_kategori = $request->id_kategori;
        $artikel->status      = 'pending';
        $artikel->id_user     = Auth::id();

        if ($request->hasFile('foto')) {
            $img  = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/artikel/', $name);
            $artikel->foto = $name;
        }

        $artikel->save();

        return redirect()->route('artikel.index')->with('success', 'artikel berhasil diunggah dan menunggu persetujuan.');
    }

    public function pendingArtikel()
    {
        $artikelPending = Artikel::where('status', 'pending')->paginate(10);
        return view('admin.artikel.pending', compact('artikelPending'));
    }

    public function approveArtikel($id)
    {
        $artikel         = Artikel::findOrFail($id);
        $artikel->status = 'approved';
        $artikel->save();

        return redirect()->back()->with('success', 'artikel berhasil disetujui.');
    }

    public function rejectArtikel($id)
    {
        $artikel         = Artikel::findOrFail($id);
        $artikel->status = 'rejected';
        $artikel->save();

        return redirect()->back()->with('success', 'artikel berhasil ditolak.');
    }

    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->with(['kategori', 'user'])->firstOrFail();
        return view('artikel.show', compact('artikel'));
    }

    public function edit($id)
    {
        $artikel  = Artikel::findOrFail($id);
        $kategori = Kategori::all();
        return view('artikel.edit', compact('artikel', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul'       => 'required',
            'deskripsi'   => 'required',
            'tanggal'     => 'required',
            'id_kategori' => 'required',
            'foto'        => 'nullable|mimes:png,jpg,webp,jpeg',
        ]);

        $artikel = Artikel::findOrFail($id);

        // Hanya update slug jika judul berubah
        if ($artikel->judul !== $request->judul) {
            $slug         = Str::slug($request->judul);
            $originalSlug = $slug;
            $counter      = 1;

            while (Artikel::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }

            $artikel->slug = $slug;
        }

        $artikel->judul       = $request->judul;
        $artikel->deskripsi   = $request->deskripsi;
        $artikel->tanggal     = $request->tanggal;
        $artikel->id_kategori = $request->id_kategori;
        $artikel->status      = 'pending';

        if ($request->hasFile('foto')) {
            $img  = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/artikel/', $name);
            $artikel->foto = $name;
        }

        $artikel->save();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        if ($artikel->foto && file_exists(public_path('images/artikel/' . $artikel->foto))) {
            unlink(public_path('images/artikel/' . $artikel->foto));
        }

        $artikel->delete();
        return redirect()->route('artikel.index')
            ->with('Berhasil', 'artikel Berhasil dihapus');
    }

}
