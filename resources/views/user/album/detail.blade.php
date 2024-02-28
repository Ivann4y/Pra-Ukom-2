@extends('user.layouts.index')
@section('content')
<div class="grid grid-cols-4 gap-4">
    @foreach ($album->foto as $foto)
            <img src="{{ asset('storage/' . $foto->path_foto) }}" alt="{{ $foto->id_foto }}" class="h-full object-cover">
            {{-- <a href="/editAlbum/{{ $editAlbum->id_album }}/{{ $editAlbum->user->username }}"
                class="fixed rounded-full bg-gray-600 place-items-center h-16 w-16 bottom-5 right-5 text-center grid text-4xl text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path
                    d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                    <path
                    d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                </svg>
            </a> --}}
            @endforeach
        </div>

@endsection
