@extends('user.layouts.index')
@section('content')
    <div class="grid grid-cols-1 place-items-center space-y-10 w-full">
        <div>
            @foreach ($fotos as $foto)
            <a href="/detailFoto/{{ $foto->id_foto }}">
                <img src="{{ asset('storage/' . $foto->path_foto) }}" alt="{{ $foto->id_foto }}" class="h-[300px] w-[300px] object-cover my-5">
            </a>
            @endforeach
        </div>
    </div>
@endsection