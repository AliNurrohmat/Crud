<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
        Daftar Buku
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 p-6 shadow-sm rounded-lg">

            <a href="{{ route('books.create') }}">+ Tambah Buku</a>

            <table class="w-full mt-4 border">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->year }}</td>

                        <td>
                            <div class="flex gap-2">

                                <a href="{{ route('books.edit', $book->id) }}">Edit</a>

                                <a href="{{ route('books.show', $book->id) }}">Detail</a>

                                <form method="POST" action="{{ route('books.destroy', $book->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>
</div>

</x-app-layout>