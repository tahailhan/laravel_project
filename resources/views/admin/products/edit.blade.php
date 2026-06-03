@extends('layouts.admin')

@section('title')
    Edit Product
@endsection

{{-- 1. CKEditor Kütüphanesini Yüklüyoruz --}}
@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <style>
        .ck-editor__editable {
            min-height: 250px;
        }
    </style>
@endsection

@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="page-heading mb-4">
                <h1 class="h3 mb-0">Edit Product: <span class="text-primary">{{ $product->title }}</span></h1>
            </div>

            <section class="row g-3">
                <div class="col-12 col-xl-8">

                    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="panel needs-validation" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="panel-header">
                            <h2 class="h5 mb-0 section-title">
                                <i class="bi bi-pencil-square" aria-hidden="true"></i>
                                <span>Update Product Details</span>
                            </h2>
                        </div>

                        <div class="panel-body p-4">

                            @include('admin.products.form')

                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <a href="{{ route('admin.product.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-x-circle" aria-hidden="true"></i> Cancel
                                </a>
                                <button class="btn btn-primary" type="submit">
                                    <i class="bi bi-check2-circle" aria-hidden="true"></i> Update Product
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </section>

        </div>
    </main>
@endsection

{{-- 2. Editörü JavaScript ile #detail alanına bağlıyoruz --}}
@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#detail' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
