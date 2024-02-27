<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Foto;
use App\Models\User;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tittle = 'Album';
        $user = User::where('id_user', auth()->id())->first();
        $album = Album::where('id_user', auth()->id())->get();
        return view('user.album.index', compact('tittle', 'user', 'album'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tittle = 'Add Album';
        $user = User::where('id_user', auth()->id())->first();
        return view('user.album.create', compact('tittle', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumRequest $request)
    {
        $data = [
            'nama_album' => request('nama'),
            'deskripsi' => request('deskripsi'),
            'id_user' => auth()->id()
        ];

        Album::create($data);
        session()->flash('Berhasil', 'Album berhasil ditambahkan');
        return redirect('/album');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_album)
    {
        $tittle = 'Detail Album';
        $album = Album::with(['user', 'foto'])->find($id_album);
        $user = User::where('id_user', auth()->id())->first();
        $editAlbum = Album::where('id_album', auth()->id())->get();
        return view('user.album.detail', compact('tittle', 'album', 'user', 'editAlbum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $id_album)
    {
        $tittle = 'Edit Album';
        $user = User::where('id_user', auth()->id())->first();
        $album = $id_album;
        return view('user.album.edit', compact('tittle', 'user', 'album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumRequest $request, Album $id_album)
    {
        $data =[
            'nama_album' => request('nama'),
            'deskripsi' => request('deskripsi')
        ];

        $id_album->update($data);
        session()->flash('Berhasil', 'Update album berhasil');
        return redirect('/album');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $id_album)
    {
        Foto::where('id_album', $id_album->id_album)->delete();

        $id_album->delete();
        session()->flash('Berhasil', 'Hapus foto berhasil');
        return redirect('/album');
    }
}
