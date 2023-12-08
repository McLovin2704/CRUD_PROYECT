<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\LoansRequest;
use App\Http\Requests\ReviewsRequest;
use App\Service\BookService;
use App\Service\LoanService;
use App\Service\ReviewService;
use App\Models\Books;
use App\Models\Loans;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $bookService;
    protected $loanService;
    protected $reviewService;

    public function __construct(BookService $bookService,  LoanService $loanService,  ReviewService $reviewService)
    {
        $this->bookService = $bookService;
        $this->loanService = $loanService;
        $this->reviewService = $reviewService;
    }

    public function dashboard()
    {
        $books = $this->bookService->getAllBooks();
        return view('client.dashboard', compact('books'));
    }

    public function showBook(Books $book)
    {
        return view('client.show', compact('book'));
    }

    public function store(Books $book, User $user)
    {
        $this->loanService->createLoan($book, $user);

        return redirect()->route('admin.dashboard')->with('success', 'Préstamo creado exitosamente');
    }

    /*

        public function index()
    {
        $loans = $this->loanService->getAllLoans();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        // Puedes cargar libros u otras variables necesarias aquí
        return view('loans.create');
    }

    public function edit($id)
    {
        $loan = $this->loanService->getLoanById($id);
        // Puedes cargar libros u otras variables necesarias aquí
        return view('loans.edit', compact('loan'));
    }

    public function update(LoansRequest $request, $id)
    {
        $loan = $this->loanService->getLoanById($id);
        $data = $request->validated();
        $this->loanService->updateLoan($loan, $data);

        return redirect()->route('loans.index')->with('success', 'Préstamo actualizado exitosamente');
    }

    public function destroy($id)
    {
        $loan = $this->loanService->getLoanById($id);
        $this->loanService->deleteLoan($loan);

        return redirect()->route('loans.index')->with('success', 'Préstamo eliminado exitosamente');
    }

    create
    store
    edit
    update
    destroy
    */
}
