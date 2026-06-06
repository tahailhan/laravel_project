@extends('layouts.admin')
@section('title', 'Order Detail')

@section('content')
    <main class="app-main p-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header"><h5>Customer Information</h5></div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $order->name }}</p>
                        <p><strong>Email:</strong> {{ $order->email }}</p>
                        <p><strong>Phone:</strong> {{ $order->phone }}</p>
                        <p><strong>Address:</strong> {{ $order->address }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header"><h5>Order Information</h5></div>
                    <div class="card-body">
                        <p><strong>Status:</strong> <span class="badge bg-primary">{{ $order->status }}</span></p>
                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label>Change Status</label>
                                <select name="status" class="form-control">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Update Status</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><h5>Order Items</h5></div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product_title }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->total, 2) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
