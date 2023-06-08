<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    use HasFactory;

    protected $table = 'book_user'; // their is no table named Shoppings in the database i want to work on the table book_user

    public function user() // relation between book_user and users tables
    {
        return $this->belongsTo(User::class);
    }

    public function book() // relation between book_user and books tables
    {
        return $this->belongsTo(Book::class);
    }
}
