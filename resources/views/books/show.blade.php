@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Detalles del Libro</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card p-4">
                    <h2>{{ $book->title }}</h2>
                    <p class="mb-2"><strong>Autor:</strong> {{ $book->author }}</p>
                    <p class="mb-2"><strong>Género:</strong> {{ $book->genre }}</p>
                    <p class="mb-2"><strong>Año de Publicación:</strong> {{ $book->publication_year }}</p>

                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Editar Libro</a>
                </div>
            </div>

            <!-- Sección de Revisiones -->
            <div class="col-md-6 mt-4">
                <h3>Opiniones</h3>
                @if ($book->reviews->isEmpty())
                    <p>No hay opiniones para este libro. ¡Sé el primero en opinar!</p>
                @else
                    <ul>
                        @foreach ($book->reviews as $review)
                            <li>
                                <strong>{{ $review->user_name }}</strong>:
                                {{ $review->comment }}
                            </li>
                        @endforeach
                    </ul>
                @endif

                <form action="{{ route('reviews.store', $book->id) }}" method="POST" class="mx-auto" style="max-width: 400px;">
                    @csrf
                    <div class="mb-3">
                        <label for="user_name" class="form-label">Nombre de Usuario:</label>
                        <input type="text" name="user_name" class="form-control" value="{{ old('user_name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comentario:</label>
                        <textarea name="comment" class="form-control" rows="3">{{ old('comment') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Opinión</button>
                </form>
            </div>
        </div>
    </div>

@endsection
