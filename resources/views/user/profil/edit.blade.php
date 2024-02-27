@extends('user.layouts.index')
@section('content')
    <div class="grid place-items-center gap-2">
        <img src="{{ asset('storage/' . $fotos->path_foto) }}" alt="{{ $fotos->id_foto }}" class="h-96 object-cover">
    </div>
    <form action="/editFoto/{{ $fotos->id_foto }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mt-2">
            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-600 focus:ring-blue-500 focus:border-blue-500 dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $fotos->deskripsi }}</textarea>
        </div>
        <div>
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select an
                option</label>
            <select id="countries" name="album"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>{{ $fotos->album->nama_album ?? 'Pilih Album' }}</option>
                @foreach ($album as $item)
                    <option value="{{ $item->id_album }}">{{ $item->nama_album }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit"
            class="mt-5 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Edit</button>
    </form>
    <button type="submit" data-modal-target="modal-delete" data-modal-toggle="modal-delete"
        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
    @include('user.profil.modalDelete')
@endsection
