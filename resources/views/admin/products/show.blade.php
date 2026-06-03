@extends('layouts.admin')

@section('title')
    Show Product
@endsection

@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            {{-- Sayfa Başlığı ve Aksiyon Butonları --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="page-heading">
                    <h1 class="h3 mb-0 text-gray-800">Product Details</h1>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2">
                        <i class="bi bi-arrow-left"></i> Back to List
                    </a>
                    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary d-flex align-items-center gap-2">
                        <i class="bi bi-pencil"></i> Edit Product
                    </a>
                </div>
            </div>

            <div class="row">
                {{-- Sol Taraf: Ürün Görseli --}}
                <div class="col-12 col-xl-4 mb-4 mb-xl-0">
                    <div class="panel h-100">
                        <div class="panel-header">
                            <h2 class="h5 mb-0 section-title">
                                <i class="bi bi-image" aria-hidden="true"></i>
                                <span>Product Image</span>
                            </h2>
                        </div>
                        <div class="panel-body p-4 d-flex align-items-center justify-content-center">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="img-fluid rounded border shadow-sm" style="max-height: 350px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded border d-flex align-items-center justify-content-center p-5 text-muted w-100" style="height: 300px;">
                                    <div class="text-center">
                                        <i class="bi bi-camera-video-off display-1 mb-3 d-block"></i>
                                        <span>No Image Available</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Sağ Taraf: Ürün Bilgileri Tablosu --}}
                <div class="col-12 col-xl-8">
                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="h5 mb-0 section-title">
                                <i class="bi bi-info-circle" aria-hidden="true"></i>
                                <span>Information</span>
                            </h2>
                        </div>
                        <div class="panel-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <tbody>
                                    <tr>
                                        <th style="width: 180px;" class="bg-light ps-4">ID</th>
                                        <td><strong>#{{ $product->id }}</strong></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light ps-4">Title</th>
                                        <td class="fw-bold text-dark">{{ $product->title }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light ps-4">Category</th>
                                        <td>
                                                <span class="text-muted fw-medium">
                                                    {{ $product->category ? $product->category->full_path : 'No Category' }}
                                                </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light ps-4">Price</th>
                                        <td><span class="badge bg-primary fs-6">{{ number_format($product->price, 2) }} $</span></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light ps-4">Stock Info</th>
                                        <td>
                                            Current: <strong class="{{ $product->stock <= $product->min_stock ? 'text-danger' : 'text-success' }}">{{ $product->stock }}</strong>
                                            <span class="mx-2">|</span>
                                            Min: <strong>{{ $product->min_stock }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light ps-4">Discount</th>
                                        <td>%{{ $product->discount ?? 0 }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light ps-4">Status</th>
                                        <td>
                                            @if($product->status == 1)
                                                <span class="badge bg-success-soft text-success px-2 py-1">True (Active)</span>
                                            @else
                                                <span class="badge bg-danger-soft text-danger px-2 py-1">False (Passive)</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light ps-4">Keywords</th>
                                        <td>{{ $product->keywords }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light ps-4">Description</th>
                                        <td>{{ $product->description }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light ps-4">Detail</th>
                                        {{-- nl2br: Enter tuşuyla yapılan satır atlamalarını HTML'de <br> etiketine çevirir --}}
                                        {{-- e(): Güvenlik için zararlı kod çalışmasını engeller --}}
                                        <td class="text-muted">{!! nl2br(e($product->detail)) !!}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light ps-4 border-bottom-0">Created At</th>
                                        <td class="border-bottom-0">{{ $product->created_at->format('d M Y, H:i') }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
