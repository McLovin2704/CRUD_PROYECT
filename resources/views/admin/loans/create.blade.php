<!-- resources/views/admin/loans/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar nuevo préstamo</h1>

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

        <form action="{{ route('loans.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="book_id" class="form-label">Libro:</label>
                <select name="book_id" class="form-select" required>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}" {{ $loan->book_id == $book->id ? 'selected' : '' }}>{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">Usuario:</label>
                <select name="user_id" class="form-select" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="loan_date" class="form-label">Fecha de préstamo:</label>
                <input type="date" name="loan_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar préstamo</button>
        </form>
    </div>

    <style>
        h1 {
            margin: 1em;
        }

        .form-group {
            margin-bottom: 1em;
        }
    </style>
@endsection
