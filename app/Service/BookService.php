<?php

namespace App\Service;

use App\Models\Books;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookService
{
    //
    public function getAllBooks()
    {
        return Books::all();
    }

    //
    public function createBook(array $data)
    {
        return Books::create($data);
    }

    //
    public function getBookById(Books $book)
    {
        return $book;
    }

    //
    public function updateBook(Books $book, array $data)
    {
        if ($book->update($data)) {
            return 'Libro actualizado exitosamente';
        }

        // Puedes lanzar una excepción en caso de error
        throw new \Exception('Error al actualizar el libro');
    }

    public function destroyBook(Books $book)
    {
        if ($book->delete()) {
            return 'Libro eliminado exitosamente';
        }

        // Puedes lanzar una excepción en caso de error
        throw new \Exception('Error al eliminar el libro');
    }
}
