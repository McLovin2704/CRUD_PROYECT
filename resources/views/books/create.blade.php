@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Libro</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <label for="title">Título:</label>
        <input type="text" name="title" required>
        <br>
        <label for="author">Autor:</label>
        <input type="text" name="author" required>
        <br>
        <label for="genre">Género:</label>
        <input type="text" name="genre" required>
        <br>
        <label for="publication_year">Año de Publicación:</label>
        <input type="number" name="publication_year" required>
        <br>
        <button type="submit">Guardar Libro</button>
    </form>
@endsection