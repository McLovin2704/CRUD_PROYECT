<?php

namespace App\Service;

use App\Http\Requests\ReviewsRequest;
use App\Models\Books;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewService
{
    public function storeReview($data, User $user)
    {
        $review = new Review($data);
        $user->reviews()->save($review);

        return $review;
    }
}
