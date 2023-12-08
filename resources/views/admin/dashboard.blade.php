@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Listado de Libros</h1>

        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="row g-0">
                            @if ($book->image_url)
                                <div class="col-md-4">
                                    <img src="{{ $book->image_url }}" alt="Imagen del libro" class="img-fluid">
                                </div>
                            @endif
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title">{{ $book->title }}</h2>
                                    <p class="card-text"><strong>Autor:</strong> {{ $book->author }}</p>
                                    <p class="card-text"><strong>Género:</strong> {{ $book->genre }}</p>
                                    <p class="card-text"><strong>Año de Publicación:</strong> {{ $book->publication_year }}</p>
                                    <a href="{{ route('admin.showBook', $book->id) }}" class="btn btn-primary">Ver Detalles</a>
                                    <form action="{{ route('admin.destroyBook', $book->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection