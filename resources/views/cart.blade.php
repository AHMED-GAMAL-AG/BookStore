@extends('layouts.main')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div id="success" style="display:none" class="col-md-8 text-center h3 p-4 bg-success text-light rounded">
                {{ __('تمت عملية الشراء بنجاح') }}
            </div>
            @if (session('message'))
                <div class="col-md-8 text-center h3 p-4 bg-success text-light rounded">{{ __('تمت عملية الشراء بنجاح') }}
                </div>
            @endif

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('عربة التسوق') }}</div>

                    <div class="card-body">

                        @if ($items->count())
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col"> {{ __('العنوان') }}</th>
                                        <th scope="col"> {{ __('السعر') }}</th>
                                        <th scope="col"> {{ __('الكمية') }}</th>
                                        <th scope="col"> {{ __('السعر الكلي') }}</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                @php($totalPrice = 0)
                                @foreach ($items as $item)
                                    {{-- pivot for pivot table user_book i want the copies in the cart --}}
                                    @php($totalPrice += $item->price * $item->pivot->number_of_copies)

                                    <tbody>
                                        <tr>
                                            <th scope="row">{{ $item->title }}</th>
                                            <td>{{ $item->price }} $</td>
                                            <td>{{ $item->pivot->number_of_copies }}</td>
                                            <td>{{ $item->price * $item->pivot->number_of_copies }} $</td>
                                            <td>
                                                <form style="float:left; margin: auto 5px" method="post"
                                                    action="{{ route('cart.remove_all', $item->id) }}">
                                                    @csrf
                                                    <button class="btn btn-outline-danger btn-sm" type="submit">
                                                        {{ __('أزل الكل') }}
                                                    </button>
                                                </form>

                                                <form style="float:left; margin: auto 5px" method="post"
                                                    action="{{ route('cart.remove_one', $item->id) }}">
                                                    @csrf
                                                    <button class="btn btn-outline-warning btn-sm" type="submit">
                                                        {{ __('أزل واحدًا') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>

                            <h4 class="mb-5">{{ __('السعر النهائي:') }} {{ $totalPrice }} $</h4>

                            <!-- Set up a container element for paypal button -->
                            <div class="d-inline-block" id="paypal-button-container"></div>

                            <a href="" class="d-inline-block mb-4 float-start btn bg-cart"
                                style="text-decoration:none;">
                                <span> {{ __('بطاقة ائتمانية') }}</span>
                                <i class="fas fa-credit-card"></i>
                            </a>
                        @else
                            <div class="alert alert-info text-center">
                                {{ __('لا يوجد كتب في العربة') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script
        src="https://www.paypal.com/sdk/js?client-id=Ad9KWQWeBL6Zqg45C56qx-oc00j6qo-MR-Wx7DCwui8EzGTWOe2U6MjpP9GNZv4c7G6PpL6MAGHvn2cy&currency=USD">
    </script>

    <script>
        paypal.Buttons({
            // Order is created on the server and the order id is returned
            createOrder() {
                return fetch("/my-server/create-paypal-order", {
                        method: "post",
                        // use the "body" param to optionally pass additional order information
                        // like product skus and quantities
                        body: JSON.stringify({
                            cart: [{
                                sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
                                quantity: "YOUR_PRODUCT_QUANTITY",
                            }, ],
                        }),
                    })
                    .then((response) => response.json())
                    .then((order) => order.id);
            },
            // Finalize the transaction on the server after payer approval
            onApprove(data) {
                return fetch("/my-server/capture-paypal-order", {
                        method: "post",
                        body: JSON.stringify({
                            orderID: data.orderID
                        })
                    })
                    .then((response) => response.json())
                    .then((orderData) => {
                        // Successful capture! For dev/demo purposes:
                        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                        const transaction = orderData.purchase_units[0].payments.captures[0];
                        alert(
                            `Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`
                        );
                        // When ready to go live, remove the alert and show a success message within this page. For example:
                        // const element = document.getElementById('paypal-button-container');
                        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                        // Or go to another URL:  window.location.href = 'thank_you.html';
                    });
            }
        }).render('#paypal-button-container');
    </script>
@endsection
