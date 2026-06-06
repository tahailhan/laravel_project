@extends('layouts.home')

@section('content')
    <div class="container-fluid bg-light py-3 mb-4">
        <div class="container">
            <ul class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ $product->title }}</li>
            </ul>
        </div>
    </div>

    <div class="container py-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row g-5">
            <div class="col-lg-5">
                <div class="border rounded p-3">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid w-100" alt="{{ $product->title }}">
                    @else
                        <img src="{{ asset('assets/img/product-1.png') }}" class="img-fluid w-100" alt="No Image">
                    @endif
                </div>
            </div>

            <div class="col-lg-7">
                <h2 class="mb-3">{{ $product->title }}</h2>
                <h3 class="text-primary mb-4">${{ number_format($product->price, 2) }}</h3>

                <p class="mb-4">
                    {{ $product->description ?? 'No description available for this product.' }}
                </p>

                <p class="mb-4 text-muted">Stock Available: <strong>{{ $product->stock }}</strong></p>

                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-flex align-items-center mb-4">
                    @csrf
                    <div class="qty-input d-flex align-items-center me-3">
                        <span class="text-uppercase fw-bold me-2">QTY: </span>
                        <input class="form-control text-center" type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" style="width: 80px;">
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill py-2 px-4 add-to-cart">
                        <i class="fa fa-shopping-cart me-2"></i> Add to Cart
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection
