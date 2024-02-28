@extends('user.layouts.index')
@section('content')
    <div class="grid grid-cols-1 place-items-center space-y-10 w-full">
        @foreach ($fotos as $foto)
            <div class="my-5 border-2 rounded-lg">
                <div class="flex mb-4 mt-2 ml-2">
                    <div class="mx-2">
                        <img src="https://source.unsplash.com/random"
                            alt="Hansohee" class="rounded-full w-10 h-10">
                    </div>
                    <div class="mt-1 font-semibold">{{ $foto->user->username }}</div>
                    <div class="ml-px mt-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-2 mt-1 font-thin">• {{ $foto->created_at->diffForHumans() }}</div>
                </div>
                <div>
                    <img src="{{ asset('storage/' . $foto->path_foto) }}" alt="{{ $foto->id_foto }}"
                        class="h-[400px] w-[400px] object-cover">
                </div>
                <div class="flex ml-2 my-2">
                    <div class="ml-2">
                        <a href="/detailFoto/{{ $foto->id_foto }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                                <path fill-rule="evenodd"
                                    d="M15 3.75a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0V5.56l-3.97 3.97a.75.75 0 1 1-1.06-1.06l3.97-3.97h-2.69a.75.75 0 0 1-.75-.75Zm-12 0A.75.75 0 0 1 3.75 3h4.5a.75.75 0 0 1 0 1.5H5.56l3.97 3.97a.75.75 0 0 1-1.06 1.06L4.5 5.56v2.69a.75.75 0 0 1-1.5 0v-4.5Zm11.47 11.78a.75.75 0 1 1 1.06-1.06l3.97 3.97v-2.69a.75.75 0 0 1 1.5 0v4.5a.75.75 0 0 1-.75.75h-4.5a.75.75 0 0 1 0-1.5h2.69l-3.97-3.97Zm-4.94-1.06a.75.75 0 0 1 0 1.06L5.56 19.5h2.69a.75.75 0 0 1 0 1.5h-4.5a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 1 1.5 0v2.69l3.97-3.97a.75.75 0 0 1 1.06 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="flex ml-2 mb-2">
                    <div class="font-semibold">
                        {{ $foto->user->username }}
                    </div>
                    <div class="ml-px mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-2 font-light">
                        {{ $foto->deskripsi }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
