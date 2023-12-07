@extends('layouts.app')

@section('content')
    <div class="conteiner">
        <h1>Detalles del Libro</h1>

        <h2>{{ $book->title }}</h2>
        <p><strong>Autor:</strong> {{ $book->author }}</p>
        <p><strong>Género:</strong> {{ $book->genre }}</p>
        <p><strong>Año de Publicación:</strong> {{ $book->publication_year }}</p>


        <a href="{{ route('books.edit', $book->id) }}">Editar Libro</a>
    </div>

    <style>
        .conteiner{
            background-color: aqua;
            margin: 5em 0;
        }

        h1{
            font-size: 40px;
        }

        h2{
            font-size: 25px;
        }

    </style>
@endsection