<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoansRequest;
use App\Models\Books;
use App\Models\Loans;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loans::all();
        return view('loans.index', compact('loans'));
    }

    public function create(Loans $loan)
    {
        $books = Books::all();
        return view('loans.create', compact('loan', 'books'));
    }

    public function store(LoansRequest $request)
    {
        $loans = Loans::create($request->validated());

        return redirect()->route('loans.index')->with('success', 'Préstamo creado exitosamente');
    }

    public function edit(Loans $loan)
    {
        $books = Books::all(); // Obtén la lista de libros para el menú desplegable
        return view('loans.edit', compact('loan', 'books'));
    }

    public function update(LoansRequest $request, Loans $loan)
    {
        $loan->update($request->validated());
        return redirect()->route('loans.index')->with('success', 'Préstamo actualizado exitosamente');
    }

    public function destroy(Loans $loan)
    {
        $loan->delete();
        return redirect()->route('loans.index')->with('success', 'Préstamo eliminado exitosamente');
    }

}
