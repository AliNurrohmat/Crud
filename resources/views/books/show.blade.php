<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
        Detail Buku
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">

            <p><b>Judul:</b> {{ $book->title }}</p>
            <p><b>Penulis:</b> {{ $book->author }}</p>
            <p><b>Tahun:</b> {{ $book->year }}</p>
            <p><b>Penerbit:</b> {{ $book->publisher }}</p>
            <p><b>Kota:</b> {{ $book->city }}</p>

            <br>

            <a href="{{ route('books.index') }}">← Kembali</a>

        </div>

    </div>
</div>

</x-app-layout>