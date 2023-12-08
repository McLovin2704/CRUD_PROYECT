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

                    <a href="{{ route('admin.editBook', $book->id) }}" class="btn btn-primary">Editar Libro</a>
                </div>
            </div>

            <!-- Sección de Revisiones -->
            <div class="col-md-6 mt-4">
                <h3>Opiniones</h3>
                @if ($book->reviews->isEmpty())
                    <p>Los usuarios han realizado apiniones por el momento</p>
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
            </div>
        </div>
    </div>

@endsection
