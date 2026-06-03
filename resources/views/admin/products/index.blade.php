@extends('layouts.admin')

@section('title')
    Products
@endsection

@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div class="page-heading">
                    <h1 class="h3 mb-0 text-gray-800">Product List</h1>
                </div>

                {{-- SADECE ADMIN ROLÜNE SAHİP KİŞİLER BU BUTONU GÖREBİLİR --}}
                @if(auth()->check() && auth()->user()->hasRole('admin'))
                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
                        <i class="bi bi-plus-circle"></i> Add New Product
                    </a>
                @endif

            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="panel">
                <div class="panel-header">
                    <h2 class="h5 mb-0 section-title">
                        <i class="bi bi-table" aria-hidden="true"></i>
                        <span>All Products</span>
                    </h2>
                </div>

                <div class="panel-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                            <tr>
                                <th style="width: 60px;">ID</th>
                                <th>Category</th>
                                <th style="width: 80px;">Image</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Discount</th>
                                <th style="width: 150px;" class="text-end">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td><strong>#{{ $product->id }}</strong></td>

                                    <td>
                                        <span class="text-muted">
                                            {{ $product->category ? $product->category->full_path : 'No Category' }}
                                        </span>
                                    </td>

                                    <td>
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                 alt="{{ $product->title }}"
                                                 width="50" height="50"
                                                 class="rounded border shadow-sm"
                                                 style="object-fit: cover;">
                                        @else
                                            <span class="badge bg-secondary">No Image</span>
                                        @endif
                                    </td>

                                    <td><span class="fw-semibold text-heading">{{ $product->title }}</span></td>

                                    <td>{{ number_format($product->price, 2) }} $</td>

                                    <td>{{ $product->stock }}</td>

                                    <td>%{{ $product->discount }}</td>

                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">

                                            <a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-sm btn-outline-info" title="Show">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form action="{{ route('admin.product.destroy', $product->id) }}"
                                                  method="POST" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-muted">
                                        <i class="bi bi-box-seam display-6 mb-2 d-block"></i>
                                        No products found.
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
