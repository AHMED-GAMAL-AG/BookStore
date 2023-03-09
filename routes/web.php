<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PublishersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.main');
    })->name('dashboard');
});

Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');

Route::get('/search', [GalleryController::class, 'search'])->name('search');

// the {book} is send from the gallery view in the href
Route::get('/book{book}', [BooksController::class, 'details'])->name('book.details');

Route::get('categories', [CategoriesController::class, 'list'])->name('gallery.categories.index');
Route::get('categories/search', [CategoriesController::class, 'search'])->name('gallery.categories.search');
Route::get('categories/{category}', [CategoriesController::class, 'results'])->name('gallery.categories.show'); // the {category} is send from the categories.index view in the href


Route::get('publishers/', [PublishersController::class, 'list'])->name('gallery.publishers.index');
Route::get('publishers/search/', [PublishersController::class, 'search'])->name('gallery.publishers.search');
Route::get('publishers/{publisher}', [PublishersController::class, 'results'])->name('gallery.publishers.show'); // the {publisher} is send from the publishers.index view in the href
