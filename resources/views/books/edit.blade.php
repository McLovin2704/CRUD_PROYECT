@extends('layouts.app')

@section('content')
    <h1>Actualizar Libro</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Título:</label>
        <input type="text" name="title" value="{{ $book->title }}" required>
        <br>
        <label for="author">Autor:</label>
        <input type="text" name="author" value="{{ $book->author }}" required>
        <br>
        <label for="genre">Género:</label>
        <input type="text" name="genre" value="{{ $book->genre }}" required>
        <br>
        <label for="publication_year">Año de Publicación:</label>
        <input type="number" name="publication_year" value="{{ $book->publication_year }}" required>
        <br>
        <button type="submit">Actualizar Libro</button>
    </form>

    <style>
        h1{
            margin-top: 2em; 
            text-align: center;
        }

        form{
            width: 30em;
            margin: 3em;
            display: flex;
            flex-direction: column;
            text-align: start;
            font-size: 22px;
            font-weight: 500;
        }

        label{
            margin-bottom: 0.5em;
        }

        input{
            width: 100%;
            height: 2em;
            font-size: 20px;
        }

        button{
            height: 2.5em;
            width: 100%;
            border-radius: 20px;
            font-size: 20px;
        }
    </style>
@endsection