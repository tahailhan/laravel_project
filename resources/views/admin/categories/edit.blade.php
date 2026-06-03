@extends('layouts.admin')

@section('title')
    Edit Category
@endsection

@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="page-heading">
                <h1 class="h3 mb-0">Edit Category: {{ $category->title }}</h1>
            </div>

            <section class="row g-3 mt-1">
                <div class="col-12 col-xl-8">

                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST"
                          enctype="multipart/form-data" class="panel needs-validation" novalidate>
                        @csrf
                        {{-- 1. Laravel Güncelleme Metodu Eklendi --}}
                        @method('PUT')

                        <div class="panel-header">
                            <h2 class="h5 mb-0 section-title">
                                <i class="bi bi-ui-checks-grid" aria-hidden="true"></i>
                                <span>Edit Validation Form</span>
                            </h2>
                        </div>

                        <div class="panel-body p-4">
                            <div class="row g-3">

                                {{-- Parent Kategori Seçimi --}}
                                <div class="col-md-6">
                                    <label class="form-label" for="parent_id">Parent</label>
                                    <select id="parent_id" name="parent_id" class="form-select" required>
                                        <option value="0" {{ $category->parent_id == 0 ? 'selected' : '' }}>Main
                                            Category
                                        </option>

                                        {{-- 2. Döngü değişkeni $cat olarak değiştirildi (çakışma önlendi) --}}
                                        @foreach($categories as $cat)
                                            {{-- 3. Kategori kendisini parent olarak seçemesin diye şart koyduk --}}
                                            @if($cat->id != $category->id)
                                                <option
                                                    value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>
                                                    @if($cat->parent_id == 0)
                                                        {{ $cat->title }}
                                                    @else
                                                        {{ $cat->getParentsTree() }} -> {{ $cat->title }}
                                                    @endif
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Title Girişi --}}
                                <div class="col-md-6">
                                    <label class="form-label" for="title">Title</label>
                                    <input class="form-control" id="title" type="text" name="title"
                                           value="{{ old('title', $category->title) }}" required>
                                </div>

                                {{-- Keywords Girişi --}}
                                <div class="col-md-6">
                                    <label class="form-label" for="Keywords">Keywords</label>
                                    <input class="form-control" id="Keywords" type="text" name="keywords"
                                           value="{{ old('keywords', $category->keywords) }}" required>
                                </div>

                                {{-- Description Girişi --}}
                                <div class="col-md-6">
                                    <label class="form-label" for="Description">Description</label>
                                    <input class="form-control" id="Description" type="text" name="description"
                                           value="{{ old('description', $category->description) }}" required>
                                </div>

                                {{-- Görsel Yükleme Alanı --}}
                                <div class="col-md-6">
                                    <label class="form-label" for="image">Image</label>
                                    {{-- Eğer mevcut bir görsel varsa üstte küçük bir önizleme gösteriyoruz --}}
                                    @if($category->image)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $category->image) }}" alt="Current Image"
                                                 width="60" height="60" class="rounded border shadow-sm"
                                                 style="object-fit: cover;">
                                            <small class="text-muted d-block">Current Image</small>
                                        </div>
                                    @endif
                                    <div class="input-group">
                                        <button class="btn btn-outline-secondary" type="button"
                                                onclick="document.getElementById('image').click()">Choose File
                                        </button>
                                        <input type="text" class="form-control" id="file-name-placeholder"
                                               placeholder="No file chosen" readonly
                                               onclick="document.getElementById('image').click()">
                                    </div>
                                    <input type="file" id="image" name="image" accept="image/*" class="d-none"
                                           onchange="document.getElementById('file-name-placeholder').value = this.files[0] ? this.files[0].name : 'No file chosen'">
                                </div>

                                {{-- Durum Seçimi --}}
                                <div class="col-md-6">
                                    <label class="form-label" for="status">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="">Choose Status</option>
                                        <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>False</option>
                                        <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>True</option>
                                    </select>
                                </div>

                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-x-circle" aria-hidden="true"></i> Cancel
                                </a>

                                <button class="btn btn-primary" type="submit">
                                    <i class="bi bi-send" aria-hidden="true"></i> Update Form
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </section>

        </div>
    </main>
@endsection
