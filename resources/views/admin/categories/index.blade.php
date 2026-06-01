@extends('layouts.admin')

@section('title')
    Categories
@endsection

@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="page-heading">
                    <h1 class="h3 mb-0 text-gray-800">Category List</h1>
                </div>
                <a href="{{ route('categories.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="bi bi-plus-circle"></i> Add New Category
                </a>
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
                        <span>All Categories</span>
                    </h2>
                </div>

                <div class="panel-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                            <tr>
                                <th style="width: 50px;">ID</th>
                                <th style="width: 80px;">Image</th>
                                <th>Title</th>
                                <th>Keywords</th>
                                <th>Description</th>
                                <th style="width: 100px;">Status</th>
                                <th style="width: 150px;" class="text-end">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td><strong>#{{ $category->id }}</strong></td>
                                    <td>
                                        @if($category->image)
                                            <img src="{{ asset('storage/' . $category->image) }}"
                                                 alt="{{ $category->title }}"
                                                 width="55" height="55"
                                                 class="rounded border shadow-sm"
                                                 style="object-fit: cover;">
                                        @else
                                            <span class="badge bg-secondary">No Image</span>
                                        @endif
                                    </td>
                                    <td><span class="fw-semibold text-heading">{{ $category->title }}</span></td>
                                    <td><small class="text-muted">{{ Str::limit($category->keywords, 30) }}</small></td>
                                    <td><small class="text-muted">{{ Str::limit($category->description, 40) }}</small>
                                    </td>
                                    <td>
                                        @if($category->status == 1)
                                            <span class="badge bg-success-soft text-success px-2 py-1">Active</span>
                                        @else
                                            <span class="badge bg-danger-soft text-danger px-2 py-1">Passive</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="#" method="POST" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        title="Delete">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">
                                        <i class="bi bi-folder-x display-6 mb-2 d-block"></i>
                                        No categories found.
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
