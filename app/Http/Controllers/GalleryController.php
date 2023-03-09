<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $books = Book::paginate(12);
        $title = 'معرض الكتب';

        return view('gallery', compact('books', 'title'));
    }

    public function search(Request $request)
    {
        // ${}$ the two $ means that search what user entered {} regardless of what is before and after it , term the the input name in the view name="term"
        $books = Book::where('title', 'like', "%{$request->term}%")->paginate(12);
        $title = ' نتائج البحث عن: ' . $request->term;

        return view('gallery', compact('books', 'title'));
    }
}
