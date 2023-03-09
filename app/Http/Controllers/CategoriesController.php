<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function results(Category $category) // get all the books in this category
    {
        $books  = $category->books()->paginate(12);
        $title = ' الكتب التابعة للتصنيف: ' . $category->name;

        return view('gallery', compact('books', 'title'));
    }

    public function list() // to get a list of all the categories
    {
        $categories = Category::all()->sortBy('name');
        $title = 'التصنيفات';

        return view('categories.index', compact('categories', 'title'));
    }

    public function search(Request $request)
    {
        // ${}$ the two $ means that search what user entered {} regardless of what is before and after it , term the the input name in the view name="term"
        $categories = Category::where('name', 'like', "%{$request->term}%")->get()->sortBy('name');
        $title = ' نتائج البحث عن: ' . $request->term;

        return view('categories.index', compact('categories', 'title'));
    }
}
