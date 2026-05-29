<tbody>
    @foreach($books as $book)
        <tr>
            <td>{{ $book->title }}</td>

            <td>
                <div class="flex items-center gap-2">

                    <x-primary-button tag="a" href="{{ route('books.edit', $book->id) }}">
                        Edit
                    </x-primary-button>

                    <x-primary-button tag="a" href="{{ route('books.show', $book->id) }}">
                        Detail
                    </x-primary-button>

                    <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                          onsubmit="return confirm('Apakah anda yakin?');">
                        @csrf
                        @method('delete')

                        <x-danger-button type="submit">
                            Hapus
                        </x-danger-button>
                    </form>

                </div>
            </td>
        </tr>
    @endforeach
</tbody>