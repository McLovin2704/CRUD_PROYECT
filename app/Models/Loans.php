<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    protected $fillable = [
        'book_id', 
        'user_name', 
        'loan_date', 
        'return_date'
    ];

    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');
    }
}
