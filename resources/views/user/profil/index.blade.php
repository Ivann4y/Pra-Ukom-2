@extends('user.layouts.index')
@section('content')
    <div class="grid grid-cols-4 gap-4">
        @foreach ($fotos as $item)
            <a href="/editFoto/{{ $item->id_foto }}/{{ $item->user->username }}">
                <img src="{{ asset('storage/' . $item->path_foto) }}" alt="{{ $item->id_foto }}" class="h-full object-cover">
            </a>
        @endforeach
    </div>

    <div>
        <a href="/newFoto"
            class="text-white h-16 w-16 rounded-full fixed bg-gray-700 bottom-5 right-5 text-center text-4xl grid place-items-center">
            <p class="mb-2">+</p>
        </a>
    </div>
@endsection
