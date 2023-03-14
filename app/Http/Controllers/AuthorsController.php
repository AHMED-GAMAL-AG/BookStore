<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();

        return view('admin.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $author = new Author;
        $author->name = $request->name;
        $author->description = $request->description;
        $author->save();

        session()->flash('flash_message', __('تمت إضافة المؤلف بنجاح'));

        return redirect(route('authors.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $author->name = $request->name;
        $author->description = $request->description;
        $author->save();

        session()->flash('flash_message', __('تم تعديل بيانات المؤلف بنجاح'));

        return redirect(route('authors.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        session()->flash('flash_message', __('تم حذف المؤلف بنجاح'));

        return redirect(route('authors.index'));
    }

    public function results(Author $author) // get all the books by this author
    {
        $books  = $author->books()->paginate(12);
        $title = ' الكتب التابعة للمؤلف: ' . $author->name;

        return view('gallery', compact('books', 'title'));
    }

    public function list() // to get a list of all the authors
    {
        $authors = Author::all()->sortBy('name');
        $title = 'المؤلفون';

        return view('authors.index', compact('authors', 'title'));
    }

    public function search(Request $request)
    {
        // ${}$ the two $ means that search what user entered {} regardless of what is before and after it , term the the input name in the view name="term"
        $authors = Author::where('name', 'like', "%{$request->term}%")->get()->sortBy('name');
        $title = ' نتائج البحث عن: ' . $request->term;

        return view('authors.index', compact('authors', 'title'));
    }
}
