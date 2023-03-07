<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function authors() // the book can by owned my many authors and the author can have many books and
    {
        return $this->belongsToMany(Author::class , 'book_author'); // many to many , by default Laravel assumes the table is author_book
    }
}
