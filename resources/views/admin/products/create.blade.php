@extends('layouts.admin')

@section('title')
    Add New Product
@endsection

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
                <h1 class="h3 mb-0">Add New Product</h1>
            </div>

            <section class="row g-3">
                <div class="col-12 col-xl-8">
                    {{-- Formumuzun başladığı yer burası --}}
                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data" class="panel needs-validation" novalidate>
                        @csrf
                        <div class="panel-header">
                            <h2 class="h5 mb-0 section-title">
                                <i class="bi bi-plus-circle" aria-hidden="true"></i>
                                <span>Product Details</span>
                            </h2>
                        </div>
                        <div class="panel-body p-4">

                            @include('admin.products.form')

                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <a href="{{ route('admin.product.index') }}" class="btn btn-outline-secondary">Cancel</a>
                                <button class="btn btn-primary" type="submit">Save Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#detail' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
