@extends('user.layouts.index')
@section('content')
    <div class="grid grid-cols-4 gap-4">
        <a href="/newAlbum"
            class="place-content-center pt-10 h-56 w-56 text-8xl rounded-lg text-center black hover:bg-gray-400 border-2">
            <p class="">+</p>
        </a>

        @foreach ($album as $item)
            <a href="/detailAlbum/{{ $item->id_album }}" class="h-56 w-56 hover:bg-gray-400 rounded-lg border-2">
                <div class="text-lg ml-2 flex text-center">
                    <p class="font-semibold">{{ $item->nama_album }}</p>
                    <p class="ml-2 font-light">• {{ $item->created_at->diffForHumans() }}</p>
                </div>
                <div class="ml-2 text-sm mt-28">
                    <p>{{ $item->deskripsi }}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
