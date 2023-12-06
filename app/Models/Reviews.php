<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $fillable = [
        'book_id', 
        'user_name', 
        'comment'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
