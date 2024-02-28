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
                <div class="bg-gray-200 hover:bg-gray-400 font-light place-items-center ml-auto border-2">
                    <form action="/likeFoto/{{ $fotos->id_foto }}" method="POST">
                        @csrf
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $like ? 'red' : 'none' }}" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="mt-1 w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            <form action="/komentar/{{ $fotos->id_foto }}" method="POST">
                @csrf
                <div class="relative mt-5">
                    <div class="flex">
                        <input type="text" id="small-input" name="komentar" placeholder="Tambah Komentar"
                            class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-200 dark:border-gray-600 dark:placeholder-black dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        <div class="ml-1">
                            <button type="submit"
                                class="hover:bg-gray-400 border-2 bg-gray-200 place-items-center rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                </svg>
                            </button>
                        </div>
                    </div>
            </form>
            @foreach ($komentars as $komentar)
                <div class="mt-10 pb-5 border-b border-white/50">
                    <div>
                        <div class="flex items-center gap-3">
                            <img src="https://source.unsplash.com/random" alt="{{ $komentar->user->username }}"
                                class="rounded-full w-10 h-10">
                            <div class="flex">
                                <p class="font-semibold">{{ $komentar->user->username }}</p>
                                <p class="mx-px mt-px"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                        clip-rule="evenodd" />
                                </svg></p>
                                <p class="font-thin mt-px ml-1">
                                    {{ $komentar->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <p class="mt-2">{{ $komentar->komentar }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
