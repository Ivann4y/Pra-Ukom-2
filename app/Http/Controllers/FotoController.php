<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Http\Requests\StoreFotoRequest;
use App\Http\Requests\UpdateFotoRequest;
use App\Models\Album;
use App\Models\Komentar;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tittle = 'Profil';
        $user = User::where('id_user', auth()->id())->first();
        $fotos = Foto::where('id_user', auth()->id())->get();
        return view('user.profil.index', compact('tittle', 'user', 'fotos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tittle = 'Upload Foto';
        $user = User::where('id_user', auth()->id())->first();
        return view('user.profil.create', compact('tittle', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFotoRequest $request)
    {
        $foto = request()->file('foto');
        $data = [
            'judul_foto' => $foto->getClientOriginalName(),
            'deskripsi' => request('deskripsi'),
            'path_foto' => $foto->store(auth()->id()),
            'id_user' => auth()->id()
        ];

        Foto::create($data);
        session()->flash('Berhasil', 'Berhasil upload gambar');
        return redirect('/profil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Foto $id_foto)
    {
        $tittle = 'Detail Foto';
        $fotos = $id_foto;
        $user = User::where('id_user', auth()->id())->first();
        $like = Like::where('id_foto', $fotos->id_foto)->where('id_user', auth()->id())->first();
        $komentars = Komentar::where('id_foto', $fotos->id_foto)->get();
        return view('user.profil.detail', compact('tittle', 'fotos', 'user', 'like', 'komentars'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foto $id_foto)
    {
        $fotos = $id_foto;
        $tittle = 'Edit Foto';
        $user = User::where('id_user', auth()->id())->first();
        $album = Album::where('id_user', auth()->id())->get();
        return view('user.profil.edit', compact('fotos', 'tittle', 'user', 'album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFotoRequest $request, Foto $id_foto)
    {
        $data = [
            'deskripsi' => request('deskripsi'),
            'id_album' => request('album')
        ];

        $id_foto->update($data);
        session()->flash('Berhasil', 'Caption di Edit');
        return redirect('/profil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto $id_foto)
    {
        Storage::delete($id_foto->path_foto);
        $id_foto->destroy($id_foto->id_foto);

        session()->flash('Berhasil', 'Berhasil menghapus foto');
        return redirect('/profil');
    }
}
