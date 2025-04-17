<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class ContentController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('permission:content-read', ['only' => ['index']]);
    //     $this->middleware('permission:content-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:content-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:content-delete', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $content = Content::all();
        return view('content.index', compact('content'));
    }

    public function create()
    {
        $content = Content::all();
        return view('content.create', compact('content'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'foto' => 'required|mimes:png,jpg,webp,jpeg',

        ]);

        $content = new Content();
        $content->judul = $request->judul;
        $content->deskripsi = $request->deskripsi;
        $content->alamat = $request->alamat;


        if ($request->hasFile('foto')) {
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/content/', $name);
            $content->foto = $name;
        }

        $content->save();

        return redirect()->route('content.index')->with('success', 'content berhasil diunggah dan menunggu persetujuan.');

    }
    public function show($id)
    {
     $content = Content::all()->findOrFail($id);
    return view('content.show', compact('content'));
    }

    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('content.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'foto' => 'required|mimes:png,jpg,webp,jpeg',
        ]);

        $content = Content::findOrFail($id);
        $content->judul = $request->judul;
        $content->deskripsi = $request->deskripsi;
        $content->alamat = $request->alamat;

        if ($request->hasFile('foto')) {
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/content/', $name);
            $content->foto = $name;
        }

        $content->save();
        return redirect()->route('content.index');

    }

    public function destroy($id)
    {
        $content = Content::findOrFail($id);
        if ($content->foto && file_exists(public_path('images/content/' . $content->foto))) {
            unlink(public_path('images/content/' . $content->foto));
        }

        $content->delete();
        return redirect()->route('content.index')
            ->with('Berhasil', 'content Berhasil dihapus');

    }

}
