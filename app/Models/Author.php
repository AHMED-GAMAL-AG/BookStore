<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public function books() // the author can have many books and the book can by owned my many authors
    {
        return $this->belongsToMany(Book::class , 'book_author'); // many to many , by default Laravel assumes the table is author_book
    }
}
