<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewsRequest;
use App\Models\Books;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(ReviewsRequest $request, Books $book)
    {
        $book->reviews()->create($request->validated());

        return redirect()->route('books.show', $book->id)->with('success', 'Review agregada exitosamente');
    }
}
