@extends('layouts.app')

@section('content')

    <div class="conteiner">
        <h1>Listado de Libros</h1>

        @foreach ($books as $book)
            <div class="book">
                <div class="card">
                    <h2>{{ $book->title }}</h2>
                    <p><strong>Autor:</strong> {{ $book->author }}</p>
                    <p><strong>Género:</strong> {{ $book->genre }}</p>
                    <p><strong>Año de Publicación:</strong> {{ $book->publication_year }}</p>
                    <a href="{{ route('books.show', $book->id) }}">Ver Detalles</a>
                </div>
            </div>
        @endforeach
    </div>

    <style>
        .conteiner{
            display: flex;
            justify-content: space-around;
            align-items: center;
            align-content: center;
            flex-wrap: wrap;
            margin: 5em 2em 0;
        }

        h1{
            width: 100%;
            text-align: center;
            margin-bottom: 2em;
        }

        h2, p{
            margin-bottom: 1em;
        }

        .book {
            flex-wrap: wrap;
        }

        .card{
            background-color: aqua;
            width: 20em;
            margin-right: 1.5em;
            margin-bottom: 2em;
            border: 1px solid black;
            border-radius: 20px;
            padding: 1em;
        }
    </style>
@endsection



