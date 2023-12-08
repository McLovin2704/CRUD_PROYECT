@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar nuevo prestamo</h1>

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
            <div class="form-group">
                <label for="user_name">Usuario</label>
                <input type="text" name="user_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="loan_date">Fecha de prestamo</label>
                <input type="date" name="loan_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar prestamo</button>
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
