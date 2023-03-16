<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function addToCart(Request $request)
    {
        // $request->id is form the ajax request
        $book = Book::find($request->id);

        // check if the book is already in cart then add it to the old quantity
        if (auth()->user()->booksInCart->contains($book)) {
            // $request->quantity is form the ajax request
            $newQuantity  = $request->quantity + auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies; // pivot is the pivot table book_user to access number_of_copies

            if ($newQuantity > $book->number_of_copies) { // if the user added more than available copies
                session()->flash('warning_message',  __('لم تتم إضافة الكتاب، لقد تجاوزت عدد النسخ الموجودة لدينا، أقصى عدد موجود بإمكانك حجزه من هذا الكتاب هو ') . ($book->number_of_copies - auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies) . ' كتاب');
            } else { // add to the cart
                // $book->id is the book to be updated in the cart
                auth()->user()->booksInCart()->updateExistingPivot($book->id, ['number_of_copies' => $newQuantity]);
            }
        } else { // the book is not in cart // $request->quantity is form the ajax request
            auth()->user()->booksInCart()->attach($request->id, ['number_of_copies' => $request->quantity]); // $request->id is form the ajax request
        }

        $number_of_products = auth()->user()->booksInCart()->count();

        return response()->json(['number_of_products' => $number_of_products]); // send to the ajax request
    }

    public function viewCart()
    {
        $items = auth()->user()->booksInCart;
        return view('cart', compact('items'));
    }

    public function removeOne(Book $book) // remove one item of this book in cart
    {
        $old_quantity = auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies; // pivot is the pivot table book_user to access number_of_copies

        if ($old_quantity > 1) {
            auth()->user()->booksInCart()->updateExistingPivot($book->id, ['number_of_copies' => --$old_quantity]);
        } else { // if their is only one item of the book then remove it from cart
            auth()->user()->booksInCart()->detach($book->id);
        }
        return redirect()->back();
    }

    public function removeAll(Book $book)
    {
        auth()->user()->booksInCart()->detach($book->id);
        return redirect()->back();
    }


}
