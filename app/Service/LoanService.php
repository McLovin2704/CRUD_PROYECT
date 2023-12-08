<?php

namespace App\Service;

use App\Http\Requests\LoansRequest;
use App\Models\Books;
use App\Models\Loans;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanService 
{
    public function get()
    {
        // Obtener todas las reservas asociadas al usuario actual
        return Auth::user()->loans;
    }

    public function createLoans(User $user, Books $book)
    {
        return $user->loans()->create([
            'book_id' => $book->id,
            'user_id' => $user->id,
            'loan_date' => now(),
            // Puedes añadir más campos según sea necesario
        ]);
    }

    public function getId($id)
    {
        // Obtener la reserva asociada al usuario actual por su ID
        return Auth::user()->loans()->findOrFail($id);
    }

    public function update($id, LoansRequest $request)
    {
        // Actualizar la reserva asociada al usuario actual por su ID
        Auth::user()->loans()->findOrFail($id)->update([
            'loan_date' => $request->input('loan_date'),
            'return_date' => $request->input('return_date'),
        ]);
    }

    public function delete($id)
    {
        // Eliminar la reserva asociada al usuario actual por su ID
        Auth::user()->loans()->findOrFail($id)->delete();
    }

















    
    public function getAllLoans()
    {
        return Loans::all();
    }

    public function getLoanById($id)
    {
        return Loans::findOrFail($id);
    }

    public function updateLoan($loan, $data)
    {
        $loan->update($data);
    }

    public function deleteLoan($loan)
    {
        $loan->delete();
    }
}