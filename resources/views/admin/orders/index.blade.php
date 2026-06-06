@extends('layouts.admin')
@section('title', 'Orders List')

@section('content')
    <div class="app-content p-4">
        <div class="card">
            <div class="card-header"><h3>Orders List</h3></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <td><span class="badge bg-primary">{{ $order->status }}</span></td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm">Show</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
