@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Actualizar Libro</h1>

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

        <form action="{{ route('books.update', $book->id) }}" method="POST" class="mx-auto" style="max-width: 400px;">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Título:</label>
                <input type="text" name="title" value="{{ $book->title }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Autor:</label>
                <input type="text" name="author" value="{{ $book->author }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Género:</label>
                <input type="text" name="genre" value="{{ $book->genre }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="publication_year" class="form-label">Año de Publicación:</label>
                <input type="number" name="publication_year" value="{{ $book->publication_year }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Libro</button>
        </form>
    </div>
@endsection
