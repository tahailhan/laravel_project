@extends('layouts.home')

@section('content')
    <div class="container-fluid bg-light py-3 mb-4">
        <div class="container">
            <ul class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">My Cart</li>
            </ul>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="col-md-12">
                <h3 class="mb-4 text-primary">Shopping Cart</h3>

                @if ($cartItems->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total</th>
                                <th class="text-end">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $subtotal = 0; @endphp
                            @foreach ($cartItems as $item)
                                @php
                                    // Satır toplamını ve genel toplamı hesaplıyoruz
                                    $lineTotal = $item->price * $item->quantity;
                                    $subtotal += $lineTotal;
                                @endphp
                                <tr>
                                    <td style="width: 100px;">
                                        @if($item->product && $item->product->image)
                                            <img  src="{{ asset('storage/' . $item->product->image) }}" class="img-fluid rounded" alt="{{ $item->product->title }}">
                                        @else
                                            <img src="{{ asset('assets/img/product-1.png') }}" class="img-fluid rounded" alt="No Image">
                                        @endif
                                    </td>
                                    <td class="fw-bold">
                                        {{ $item->product->title ?? 'Product Deleted' }}
                                    </td>
                                    <td class="text-center text-muted">
                                        ${{ number_format($item->price, 2) }}
                                    </td>
                                    <td class="text-center" style="width: 150px;">
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex align-items-center">
                                            @csrf
                                            <input type="number" name="quantity" class="form-control form-control-sm text-center me-2" value="{{ $item->quantity }}" min="1">
                                            <button type="submit" class="btn btn-sm btn-outline-primary" title="Update"><i class="fas fa-sync-alt"></i></button>
                                        </form>
                                    </td>
                                    <td class="text-center fw-bold text-primary">
                                        ${{ number_format($lineTotal, 2) }}
                                    </td>
                                    <td class="text-end">
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Remove Item"><i class="fa fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="4" class="text-end fs-5">Subtotal:</th>
                                <th colspan="2" class="text-start fs-5 text-primary">${{ number_format($subtotal, 2) }}</th>
                            </tr>
                            <tr>
                                <th colspan="6" class="text-end pt-4">
                                    <a href="{{ route('checkout') }}" class="btn btn-primary rounded-pill py-3 px-5">
                                        Proceed to Checkout <i class="fa fa-arrow-right ms-2"></i>
                                    </a>
                                </th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fa fa-shopping-cart fa-4x text-muted mb-3"></i>
                        <h4 class="text-muted">Your cart is currently empty.</h4>
                        <a href="{{ route('home') }}" class="btn btn-primary rounded-pill py-2 px-4 mt-3">Return to Shop</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
