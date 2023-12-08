@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        
        <h1 class="text-center">Lista de Préstamos</h1>

        <a href="{{ route('loans.create') }}" class="btn btn-success mb-3">Agregar Préstamo</a>

        <div class="row">
            @foreach ($loans as $loan)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $loan->book->title}}</h5>
                            <p class="card-text"><strong>Usuario:</strong> {{ $loan->user_name }}</p>
                            <p class="card-text"><strong>Fecha de Préstamo:</strong> {{ $loan->loan_date }}</p>
                            <p class="card-text"><strong>Fecha de Entrega:</strong> {{ $loan->return_date }}</p>

                            <a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-primary btn-sm">Editar</a>

                            <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
