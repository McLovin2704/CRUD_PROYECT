<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
        'title',
        'author', 
        'genre', 
        'publication_year'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'book_id');
    }

    public function loans()
    {
        return $this->hasMany(Loans::class);
    }
}
