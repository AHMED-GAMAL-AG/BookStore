<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Book;
use App\Models\Shopping;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
// Import the class namespaces first, before using it directly
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PurchaseController extends Controller
{

    private $provider;

    function __construct()
    {
        $this->provider = new PayPalClient;
        $this->provider->setApiCredentials(config('paypal'));
        $token = $this->provider->getAccessToken();
        $this->provider->setAccessToken($token);
    }


    public function cratePayment(Request $request) // for paypal
    {
        // 'userId': "{{ auth()->user()->id }}", is send from the cart.blade.php receive it in the $request
        $data = json_decode($request->getContent(), true); // receive the userId // decode to convert it to a php variable , tue makes it an associative array

        $books = User::find($data['userId'])->booksInCart; // get books in cart
        $total = 0;

        foreach ($books as  $book) {
            $total += $book->price + $book->pivot->number_of_copies;  // pivot to get number of copies in cart "the pivot table"
        }

        $order = $this->provider->createOrder([
            'intent' => 'CAPTURE',
            'purchase_units' => [
                'amount' =>  [
                    'currency_code' => 'USD',
                    'value' => $total
                ],
                'description' => 'Order Description'
            ]
        ]);

        return response()->json($order); // send the response to the .then() in the cart.blade.php
    }

    public function executePayment(Request $request) // for paypal
    {
        // 'userId': "{{ auth()->user()->id }}",  orderId: data.orderID, is send from the cart.blade.php receive it in the $request
        $data = json_decode($request->getContent(), true); // receive the userId  and orderId // decode to convert it to a php variable , tue makes it an associative array

        $result = $this->provider->capturePaymentOrder($data['orderId']); // do payment for this orderId and capture  payment the order.

        if ($result['status'] === 'COMPLETED') {
            $user = User::find($data['userId']);
            $books = $user->booksInCart;

            $this->sendOrderConfirmationMail($books, auth()->user()); // send confirmation mail

            // save the book info when purchase it to show it later in the payments page
            foreach ($books as $book) {
                $book_price = $book->price;
                $purchase_time = Carbon::now();
                $user->booksInCart()->updateExistingPivot($book->id, ['bought' => true, 'price' => $book_price, 'created_at' => $purchase_time]); // update the book_user table (cart)
                $book->save();
            }
        }

        return response()->json($result); // send the response to the .then() in the cart.blade.php
    }

    public function creditCheckout(Request $request)
    {
        $intent = auth()->user()->createSetupIntent(); // stripe intent

        $user_id = auth()->user()->id;
        $books = User::find($user_id)->booksInCart;
        $total = 0;

        foreach ($books as $book) {
            $total += $book->price * $book->pivot->number_of_copies; // pivot to get number of copies in cart "the pivot table"
        }

        return view('credit.checkout', compact('total', 'intent'));
    }

    public function purchase(Request $request) // for stripe credit card
    {
        $user = $request->user();
        $payment_method = $request->input('payment_method'); // contains card_holder_name and card type

        $user_id = auth()->user()->id;
        $books = User::find($user_id)->booksInCart;
        $total = 0;

        foreach ($books as $book) {
            $total += $book->price * $book->pivot->number_of_copies; // pivot to get number of copies in cart "the pivot table"
        }

        try {
            $user->createOrGetStripeCustomer(); // create a customer
            $user->updateDefaultPaymentMethod($payment_method); // set visa or master card
            $user->charge($total * 100, $payment_method); // *method because stripe works with cent

        } catch (\Exception $exception) {
            return back()->with('حصل خطأ أثناء شراء المنتج، الرجاء التأكد من معلومات البطاقة', $exception->getMessage());
        }

        $this->sendOrderConfirmationMail($books, auth()->user()); // send confirmation mail

        // save the book info when purchase it to show it later in the payments page
        foreach ($books as $book) {
            $book_price = $book->price;
            $purchase_time = Carbon::now();
            $user->booksInCart()->updateExistingPivot($book->id, ['bought' => true, 'price' => $book_price, 'created_at' => $purchase_time]); // update the book_user table (cart)
            $book->save();
        }

        return redirect('/cart')->with('message', 'تم شراء المنتج بنجاح');
    }

    public function sendOrderConfirmationMail($order, $user)
    {
        // $order, $user will be sent to the constructor of the OrderMail
        Mail::to($user->email)->send(new OrderMail($order, $user));
    }

    public function myProduct() // get all products purchased by the user
    {
        $user_id = auth()->user()->id;
        $my_books = User::find($user_id)->purchasedProduct;

        return view('books.my-product', compact('my_books'));
    }

    public function allProducts()
    {
        // with(['user', 'book']) the methods inside the controller
        $all_books = Shopping::with(['user', 'book'])->where('bought', true)->get();
        return view('admin.books.all-products', compact('all_books'));
    }
}
