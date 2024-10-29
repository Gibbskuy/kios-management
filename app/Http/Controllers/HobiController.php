<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use Illuminate\Http\Request;

class HobiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hobi = Hobi::all();
        return view('hobi.index', compact('hobi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hobi = Hobi::all();
        return view('hobi.create', compact('hobi'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'hobi' => 'required|unique:hobis',
        ]);

        $hobi = new Hobi();
        $hobi->hobi = $request->hobi;
        $hobi->save();

        return redirect()->route('hobi.index')
            ->with('success', 'Data berhasil di tambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'hobi' => 'required|unique:hobis',
        ]);

        $hobi = Hobi::findOrFail($id);
        $hobi->hobi = $request->hobi;
        $hobi->save();

        return redirect()->route('hobi.index')
            ->with('success', 'Data berhasil di ubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hobi = Hobi::findOrFail($id);
        $hobi->delete();
        return redirect()->route('hobi.index')
            ->with('success', 'Data berhasil di hapus');

    }
}
