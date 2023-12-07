@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agrega un nuevo libro</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>¡Ups! Algo salió mal. Por favor, corrige los siguientes errores:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="author">Autor:</label>
                <input type="text" name="author" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="genre">Género:</label>
                <input type="text" name="genre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="publication_year">Año de Publicación:</label>
                <input type="number" name="publication_year" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Libro</button>
        </form>
    </div>

    <style>
        h1{
            margin: 1em;
        }
        .form-group{
            margin-bottom: 1em;
        }
    </style>
@endsection
