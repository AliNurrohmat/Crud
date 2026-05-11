<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookshelf;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['books'] = Book::all();   // menagmbil data buku dari model Book
        return view('books.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['bookshelves'] = Bookshelf::pluck('name', 'id');
        return view('books.create', $data);  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // lakukan validasi
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:150',
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')),
            'publisher' => 'required|max:100',
            'city' => 'required|max:75',
            'bookshelf_id' => 'required',
            'cover' => 'nullable|image',
        ]);

        if($request->hasFile('cover')){
            $path = $request->file('cover')->storeAs(
                'cover_buku',
                'cover_buku'.time().'.'.$request->file('cover')->extension(), 'public'
            );
            $validated['cover'] = basename($path);
        }

        Book::create($validated);

        $notif = array(
            'message' => 'Data Buku Berhasil Ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('books.index')->with($notif);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['book'] = Book::findOrFail($id);
        $data['bookshelves'] = Bookshelf::pluck('name', 'id');

        return view('books.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // lakukan validasi
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:150',
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')),
            'publisher' => 'required|max:100',
            'city' => 'required|max:75',
            'bookshelf_id' => 'required',
            'cover' => 'nullable|image',
        ]);

        $book = Book::findOrFail($id);

        if($request->hasFile('cover')){
            $file = $request->file('cover');
            $filename = 'cover_buku'.time().'.'.$file->extension();
            $file->storeAs('cover_buku', $filename, 'public');
            $validated['cover'] = $filename;
        }else{
            $validated['cover'] = $book->cover;
        }

        $book->update($validated);

        $notif = array(
            'message' => 'Data Buku Berhasil DiUpdate',
            'alert-type' => 'success'
        );

        return redirect()->route('books.index')->with($notif);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
{
    $book = Book::findOrFail($id);

    $book->delete();

    $notif = array(
        'message' => 'Data Buku Berhasil Dihapus',
        'alert-type' => 'success'
    );

    return redirect()->route('books.index')->with($notif);
}
    }
}
