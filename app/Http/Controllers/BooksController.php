<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Books::all();
        return view('list', [
            "books" => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'author' => 'required',
            'sinopsis' => 'required',
            'penerbit' => 'required',
        ]);

        Books::create($validatedData);
        return redirect()->route('Books.index')->with('success', 'Buku baru berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Books $books)
    {
        $books = Books::first();
        return view('detail', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $books)
    {
        $books = Books::first();
        return view('update', [
            "books" => $books
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $books, $id)
    {
        $rules = $request->validate([
            'judul' => 'required',
            'author' => 'required',
            'sinopsis' => 'required',
            'penerbit' => 'required',
        ]);

        $validatedData = $rules;

        Books::find($id)->update($validatedData);
        return redirect()->route('Books.index')->with('success', 'Buku berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $books, $id)
    {
        if ($books->old_cover) {
            Storage::delete($id->old_cover);
        };
        $book = Books::find($id);
        $book->delete();
        return redirect()->route('Books.index')->with('success', 'Buku berhasil di hapus');
    }
}
