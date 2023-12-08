@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Editar Préstamo</h1>

        <form action="{{ route('loans.update', $loan->id) }}" method="POST" class="mx-auto" style="max-width: 400px;">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="book_id" class="form-label">Libro:</label>
                <select name="book_id" class="form-select" required>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}" {{ $loan->book_id == $book->id ? 'selected' : '' }}>{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="user_name" class="form-label">Nombre de Usuario:</label>
                <input type="text" name="user_name" class="form-control" value="{{ $loan->user_name }}" required>
            </div>
            <div class="mb-3">
                <label for="loan_date" class="form-label">Fecha de Préstamo:</label>
                <input type="date" name="loan_date" class="form-control" value="{{ $loan->loan_date }}" required>
            </div>
            <div class="mb-3">
                <label for="return_date" class="form-label">Fecha de Devolución:</label>
                <input type="date" name="return_date" class="form-control" value="{{ $loan->return_date }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Préstamo</button>
        </form>
    </div>
@endsection
