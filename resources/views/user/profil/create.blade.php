@extends('user.layouts.index')
@section('content')
    <p class="text-4xl"><u>Upload Foto</u></p>
    <form action="/newFoto" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" for="foto">Upload file</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-600 focus:outline-none dark:bg-white-700 dark:border-white-600 dark:placeholder-gray-600"
                id="foto" type="file" name="foto">
        </div>
        <div class="mt-2">
            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Caption</label>
            <input type="text" id="deskripsi" name="deskripsi"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-200 dark:border-gray-600 dark:placeholder-gray-200 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <button type="submit"
            class="mt-5 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Create</button>
    </form>
@endsection
