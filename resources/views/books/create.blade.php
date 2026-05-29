<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
</head>
<body>

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div style="background:#ffe5e5; color:red; padding:10px; margin-bottom:15px;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post"
                      action="{{ route('books.store') }}"
                      enctype="multipart/form-data"
                      class="mt-6 space-y-6">

                    @csrf

                    {{-- TITLE --}}
                    <div class="max-w-xl">
                        <x-input-label for="title" value="Judul"/>
                        <x-text-input id="title" type="text" name="title"
                            class="mt-1 block w-full"
                            value="{{ old('title')}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    {{-- AUTHOR --}}
                    <div class="max-w-xl">
                        <x-input-label for="author" value="Penulis"/>
                        <x-text-input id="author" type="text" name="author"
                            class="mt-1 block w-full"
                            value="{{ old('author')}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('author')" />
                    </div>

                    {{-- YEAR --}}
                    <div class="max-w-xl">
                        <x-input-label for="year" value="Tahun Terbit"/>
                        <x-text-input id="year" type="number" name="year"
                            class="mt-1 block w-full"
                            value="{{ old('year')}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('year')" />
                    </div>

                    {{-- PUBLISHER --}}
                    <div class="max-w-xl">
                        <x-input-label for="publisher" value="Penerbit"/>
                        <x-text-input id="publisher" type="text" name="publisher"
                            class="mt-1 block w-full"
                            value="{{ old('publisher')}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('publisher')" />
                    </div>

                    {{-- CITY --}}
                    <div class="max-w-xl">
                        <x-input-label for="city" value="Kota Terbit"/>
                        <x-text-input id="city" type="text" name="city"
                            class="mt-1 block w-full"
                            value="{{ old('city')}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('city')" />
                    </div>

                    {{-- BOOKSHELF --}}
                    <div class="max-w-xl">
                        <x-input-label for="bookshelf" value="Kategori Rak Buku"/>
                        <x-select-input id="bookshelf" name="bookshelf_id"
                            class="mt-1 block w-full" required>

                            <option value="">Pilih Rak</option>

                            @foreach($bookshelves as $key => $value)
                                <option value="{{ $key }}"
                                    {{ old('bookshelf_id') == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach

                        </x-select-input>

                        <x-input-error class="mt-2" :messages="$errors->get('bookshelf_id')" />
                    </div>

                    {{-- COVER --}}
                    <div class="max-w-xl">
                        <x-input-label for="cover" value="Cover Buku"/>

                        <x-file-input id="cover"
                            name="cover"
                            accept="image/*"
                            class="mt-1 block w-full"/>

                        <x-input-error class="mt-2" :messages="$errors->get('cover')" />
                    </div>

                    {{-- BUTTON --}}
                    <div class="flex items-center gap-4">
                        <x-secondary-button tag="a" href="{{ route('books.index')}}">
                            Cancel
                        </x-secondary-button>

                        <x-primary-button name="save" value="true">
                            Save
                        </x-primary-button>
                    </div>

                </form>
            </div>

        </div>
    </div>

</x-app-layout>

</body>
</html>