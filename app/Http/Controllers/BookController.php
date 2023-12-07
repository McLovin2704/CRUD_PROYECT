<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //Vista principal 
    public function index()
    {
        $books = Books::all();
        return view('books.index', compact('books'));
    }

    //
    public function create()
    {
        return view('books.create');
    }

    //
    public function store(BookRequest $request)
    {
        $book = Books::create($request->validated());
        return redirect()->route('books.index')->with('success', 'Libro creado exitosamente');
    }

    //
    public function show(Books $book)
    {
        return view('books.show', compact('book'));
    }

    //
    public function edit(Books $book)
    {
        return view('books.edit', compact('book'));
    }

    //
    public function update(BookRequest $request, Books $book)
    {
        $book->update($request->validated());
        return redirect()->route('books.index')->with('success', 'Libro actualizado exitosamente');
    }

    //
    public function destroy(Books $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Libro eliminado exitosamente');
    }
}
