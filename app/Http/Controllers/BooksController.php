<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Traits\imageUploadTrait;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{

    use imageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index() // show a table with all the books to the admin
    {
        $books = Book::all();

        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();

        return view('admin.books.create', compact('authors', 'categories', 'publishers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'isbn' => 'required|alpha_num|unique:books,isbn',
            'cover_image' => 'image|required',
            'category' => 'nullable',
            'authors' => 'nullable',
            'publisher' => 'nullable',
            'description' => 'nullable',
            'publish_year' => 'numeric|nullable',
            'number_of_pages' => 'numeric|required',
            'number_of_copies' => 'numeric|required',
            'price' => 'numeric|required',
        ]);

        $book = new Book;

        $book->title = $request->title;
        $book->cover_image = $this->uploadImage($request->cover_image); // to resize the image defined in app/traits/imageUploadTrait.php
        $book->isbn = $request->isbn;
        $book->category_id = $request->category;
        $book->publisher_id = $request->publisher;
        $book->description = $request->description;
        $book->publish_year = $request->publish_year;
        $book->number_of_pages = $request->number_of_pages;
        $book->number_of_copies = $request->number_of_copies;
        $book->price = $request->price;

        $book->save();

        // attach() connect two models with each other having many to many relation
        $book->authors()->attach($request->authors);

        // 'flash_message' is the 'flash_message' used in default.blade.php @if (Session::has('flash_message'))
        // session is a helper to manage session variables
        session()->flash('flash_message', 'تمت إضافة الكتاب بنجاح');

        return redirect(route('books.show', $book)); // show the book details for admin
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();

        return view('admin.books.edit', compact('book', 'authors', 'categories', 'publishers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'title' => 'required',
            'cover_image' => 'image',
            'category' => 'nullable',
            'authors' => 'nullable',
            'publisher' => 'nullable',
            'description' => 'nullable',
            'publish_year' => 'numeric|nullable',
            'number_of_pages' => 'numeric|required',
            'number_of_copies' => 'numeric|required',
            'price' => 'numeric|required',
        ]);

        $book->title = $request->title;
        // if the admin added new image delete old one
        if ($request->has('cover_image')) {
            Storage::disk('public')->delete($book->cover_image);
            $book->cover_image = $this->uploadImage($request->cover_image); // to resize the image defined in app/traits/imageUploadTrait.php
        }
        $book->isbn = $request->isbn;
        $book->category_id = $request->category;
        $book->publisher_id = $request->publisher;
        $book->description = $request->description;
        $book->publish_year = $request->publish_year;
        $book->number_of_pages = $request->number_of_pages;
        $book->number_of_copies = $request->number_of_copies;
        $book->price = $request->price;

        // because of the isbn unique problem if the isbn is edited do validation else ignore
        if ($book->isDirty('isbn')) {
            $this->validate($request, [
                'isbn' => 'required|alpha_num|unique:books,isbn',
            ]);
        }

        $book->save();

        // attach() connect two models with each other having many to many relation
        $book->authors()->detach();
        $book->authors()->attach($request->authors);

        // 'flash_message' is the 'flash_message' used in default.blade.php @if (Session::has('flash_message'))
        // session is a helper to manage session variables
        session()->flash('flash_message', 'تم تعديل بيانات الكتاب بنجاح');

        return redirect(route('books.show', $book)); // show the book details for admin
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        Storage::disk('public')->delete($book->cover_image);
        $book->delete();

        session()->flash('flash_message', 'تم حذف الكتاب بنجاح');

        return redirect(route('books.index'));
    }

    public function details(Book $book) // show the book details when clicked by the user
    {
        return view('books.details', compact('book'));
    }
}
