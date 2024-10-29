<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index()
    {
        $hobi = Hobi::all();
        $profile = Profile::where('id_user', Auth::id())->first();
        return view('profile.index', compact('profile', 'hobi'));
    }

    public function create()
    {
        $hobi = Hobi::all();
        $user = User::all();
        return view('profile.create', compact('user', 'hobi'));
    }

    public function store(Request $request)
    {

        $request->validate([

            'nama_lengkap' => 'required|string|max:255',
            'jk' => 'required',
            'tgl' => 'required|date|before_or_equal:' . \Carbon\Carbon::now()->subYears(12)->format('Y-m-d'),
            'agama' => 'required',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $profile = new Profile();

        if (Auth::check()) {
            $profile->id_user = Auth::id();
        } else {
            return redirect()->back()->withErrors(['msg' => 'Anda harus login untuk membuat profil.']);
        }

        $profile->nama_lengkap = $request->nama_lengkap;
        $profile->jk = $request->jk;
        $profile->tgl = $request->tgl;
        $profile->agama = $request->agama;
        $profile->alamat = $request->alamat;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/profile'), $filename);
            $profile->foto = $filename;
        }

        $profile->save();

        return redirect()->route('profile.index', $profile->id)
            ->with('success', 'Profil berhasil dibuat.');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);

        $request->validate([
            'nama_lengkap' => 'required',
            'jk' => 'required',
            'tgl' => 'required|date|before_or_equal:' . \Carbon\Carbon::now()->subYears(12)->format('Y-m-d'),
            'agama' => 'required',
            'alamat' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        $profile->nama_lengkap = $request->nama_lengkap;
        $profile->jk = $request->jk;
        $profile->tgl = $request->tgl;
        $profile->alamat = $request->alamat;
        $profile->agama = $request->agama;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/profile'), $filename);
            $profile->foto = $filename;
        }

        $profile->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }

    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        if ($profile->foto && file_exists(public_path('images/profile/' . $profile->foto))) {
            unlink(public_path('images/profile/' . $profile->foto));
        }

        $profile->delete();
        // Alert::success('Success', 'Data Ini Telah Di Hapus')->autoclose(2000);
        return redirect()->route('profile.index')
            ->with('Berhasil', 'profile Berhasil dihapus');

    }

}
