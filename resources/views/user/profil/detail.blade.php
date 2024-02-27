@extends('user.layouts.index')
@section('content')
    <div class="flex gap-4">
        <div>
            <img src="{{ asset('storage/' . $fotos->path_foto) }}" alt="{{ $fotos->id_foto }}"
                class="w-[400px] h-[400px] object-cover">
        </div>
        <div>
            <p class="text-xl">
                {{ $fotos->judul_foto }}
            </p>
            <div class="flex mt-5">
                <p class="font-semibold">
                    {{ $fotos->deskripsi }}  
                </p>
                <p class="font-light ml-auto">
                    {{ $fotos->created_at->format('j M Y') }}
                </p>
            </div>
        </div>
    </div>
@endsection
