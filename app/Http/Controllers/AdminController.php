<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\LoansRequest;
use App\Service\BookService;
use App\Service\LoanService;
use App\Service\UserService;
use App\Service\ReviewService;
use App\Models\Books;
use App\Models\Loans;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $bookService;
    protected $loanService;
    protected $userService;

    public function __construct(BookService $bookService,  LoanService $loanService, UserService $userService)
    {
        $this->bookService = $bookService;
        $this->loanService = $loanService;
        $this->userService = $userService;
    }

    public function dashboard()
    {
        $books = $this->bookService->getAllBooks();
        return view('admin.dashboard', compact('books'));
    }

    public function showBook(Books $book)
    {
        return view('admin.show', compact('book'));
    }

    public function createBook(){
        return view('admin.create');
    }

    public function storeBook(BookRequest $request)
    {
        $this->bookService->createBook($request->validated());

        return redirect()->route('admin.dashboard')->with('success', 'Libro creado exitosamente');
    }

    public function editBook(Books $book)
    {
        return view('admin.edit', compact('book'));
    }

    public function updateBook(BookRequest $request, Books $book)
    {
        $this->bookService->updateBook($book, $request->validated());
        return redirect()->route('admin.dashboard')->with('success', 'Libro actualizado exitosamente');
    }

    public function destroyBook(Books $book)
    {
        $this->bookService->destroyBook($book);
        return redirect()->route('admin.dashboard')->with('success', 'Libro eliminado exitosamente');
    }

    public function index()
    {
        $loans = $this->loanService->getAllLoans();
        return view('admin.loans.index', compact('loans'));
    }

    public function store(){
        $books = Books::all();
        $users = User::all(); 
        $loan = new Loans();
        return view('admin.loans.index', compact('books', 'users', 'loan'));
    }


    public function edit($id)
    {
        $loan = $this->loanService->getLoanById($id);
        $books = Books::all();
        return view('admin.loans.edit', compact('loan', 'books'));
    }

    public function update(LoansRequest $request, $id)
    {
        $loan = $this->loanService->getLoanById($id);
        $this->loanService->updateLoan($loan, $request->validated());
        return redirect()->route('loans.index')->with('success', 'Préstamo actualizado exitosamente');
    }

    public function destroy($id)
    {
        $loan = $this->loanService->getLoanById($id);
        $this->loanService->deleteLoan($loan);
        return redirect()->route('loans.index')->with('success', 'Préstamo eliminado exitosamente');
    }
}
