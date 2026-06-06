@extends('layouts.home')

@section('content')
    <div class="container py-5">
        <div class="row">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('place.order') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="mb-4">Billing Details</h3>
                        <div class="form-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="address" class="form-control" placeholder="Address" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="city" class="form-control" placeholder="City">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="phone" class="form-control" placeholder="Phone">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h3 class="mb-4">Order Review</h3>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cartItems as $item)
                                <tr>
                                    <td>{{ $item->product->title }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="2">Subtotal</th>
                                <th>${{ number_format($subtotal, 2) }}</th>
                            </tr>
                            <tr>
                                <th colspan="2">Total</th>
                                <th class="text-primary">${{ number_format($total, 2) }}</th>
                            </tr>
                            </tfoot>
                        </table>

                        <div class="mt-4">
                            <h5>Payment Method</h5>
                            <select name="payment_method" class="form-control">
                                <option value="Direct Bank Transfer">Direct Bank Transfer</option>
                                <option value="Cash on Delivery">Cash on Delivery</option>
                            </select>

                            <input type="hidden" name="shipping_method" value="Standard">

                            <button type="submit" class="btn btn-primary w-100 mt-4 py-3">
                                Place Order
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
