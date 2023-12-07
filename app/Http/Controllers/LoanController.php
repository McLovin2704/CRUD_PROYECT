<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoansRequest;
use App\Models\Loans;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loans::all();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        // Puedes implementar lógica según tus necesidades, por ejemplo, cargar la lista de libros disponibles.
        // ...

        return view('loans.create');
    }

    public function store(LoansRequest $request)
    {
        Loans::create($request->validated());

        return redirect()->route('loans.index')->with('success', 'Préstamo creado exitosamente');
    }
}
