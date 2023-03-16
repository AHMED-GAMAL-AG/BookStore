<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PublishersController;
use App\Http\Controllers\UsersController;
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

Route::get('/book/{book}', [BooksController::class, 'details'])->name('book.details'); // the {book} is send from the gallery view in the href
Route::post('/book/{book}/rate', [BooksController::class, 'rate'])->name('book.rate');

Route::get('/categories', [CategoriesController::class, 'list'])->name('gallery.categories.index');
Route::get('/categories/search', [CategoriesController::class, 'search'])->name('gallery.categories.search');
Route::get('/categories/{category}', [CategoriesController::class, 'results'])->name('gallery.categories.show'); // the {category} is send from the categories.index view in the href

Route::get('/publishers', [PublishersController::class, 'list'])->name('gallery.publishers.index');
Route::get('/publishers/search', [PublishersController::class, 'search'])->name('gallery.publishers.search');
Route::get('/publishers/{publisher}', [PublishersController::class, 'results'])->name('gallery.publishers.show'); // the {publisher} is send from the publishers.index view in the href

Route::get('/authors', [AuthorsController::class, 'list'])->name('gallery.authors.index');;
Route::get('/authors/search', [AuthorsController::class, 'search'])->name('gallery.authors.search');
Route::get('/authors/{author}', [AuthorsController::class, 'results'])->name('gallery.authors.show'); // the {author} is send from the authors.index view in the href



// delete the /admin form all the route as it is in the prefix('/admin') instead
Route::prefix('/admin')->middleware('can:update-books')->group(function () {
    Route::get('/', [AdminsController::class, 'index'])->name('admin.index')->middleware('can:update-books');
    Route::resource('/books', BooksController::class);
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/publishers', PublishersController::class);
    Route::resource('/authors', AuthorsController::class);
    Route::resource('/users', UsersController::class)->middleware('can:update-users'); // only super admin can update-users
});

Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/remove-one/{book}', [CartController::class, 'removeOne'])->name('cart.remove_one'); // remove one item of this book in cart
Route::post('/remove-all/{book}', [CartController::class, 'removeAll'])->name('cart.remove_all');
