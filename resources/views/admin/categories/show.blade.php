@extends('layouts.admin')

@section('title')
    Show Category
@endsection

@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            {{-- Başlık ve Geri Dön Butonu --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="page-heading">
                    <h1 class="h3 mb-0 text-gray-800">Category Details</h1>
                </div>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Back to List
                </a>
            </div>

            {{-- Detay Tablosu --}}
            <div class="panel">
                <div class="panel-header">
                    <h2 class="h5 mb-0 section-title">
                        <i class="bi bi-eye" aria-hidden="true"></i>
                        <span>Viewing: {{ $category->title }}</span>
                    </h2>
                </div>

                <div class="panel-body p-4">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <tbody>
                            <tr>
                                <th style="width: 250px;" class="bg-light">ID</th>
                                <td><strong>#{{ $category->id }}</strong></td>
                            </tr>

                            <tr>
                                <th class="bg-light">Parent Category</th>
                                {{-- Hocanın uzun uzun yazdığı php kodunun bizim sistemdeki tek satırlık karşılığı :) --}}
                                <td>
                                        <span class="text-primary fw-semibold">
                                            {{ $category->getParentsTree() }}
                                        </span>
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-light">Title</th>
                                <td>{{ $category->title }}</td>
                            </tr>

                            <tr>
                                <th class="bg-light">Keywords</th>
                                <td>{{ $category->keywords }}</td>
                            </tr>

                            <tr>
                                <th class="bg-light">Description</th>
                                <td>{{ $category->description }}</td>
                            </tr>

                            <tr>
                                <th class="bg-light">Image</th>
                                <td>
                                    @if($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}"
                                             alt="{{ $category->title }}"
                                             class="rounded border shadow-sm"
                                             style="max-width: 200px; max-height: 200px; object-fit: contain;">
                                    @else
                                        <span class="badge bg-secondary">No Image Uploaded</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-light">Status</th>
                                <td>
                                    @if($category->status == 1)
                                        <span class="badge bg-success-soft text-success px-3 py-2">True (Active)</span>
                                    @else
                                        <span class="badge bg-danger-soft text-danger px-3 py-2">False (Passive)</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-light">Created At</th>
                                <td>{{ $category->created_at ? $category->created_at->format('d M Y, H:i') : 'N/A' }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
