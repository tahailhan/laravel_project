@extends('layouts.admin')

@section('title')
    Add Category
@endsection

@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="page-heading">
                <h1 class="h3 mb-0">Add Category</h1>
            </div>

            <section class="row g-3 mt-1">
                <div class="col-12 col-xl-8">

                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="panel needs-validation" novalidate>
                        @csrf

                        <div class="panel-header">
                            <h2 class="h5 mb-0 section-title">
                                <i class="bi bi-ui-checks-grid" aria-hidden="true"></i>
                                <span>Validation Form</span>
                            </h2>
                        </div>

                        <div class="panel-body p-4">
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label" for="title">Title</label>
                                    <input class="form-control" id="title" type="text" name="title" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Keywords">Keywords</label>
                                    <input class="form-control" id="Keywords" type="text" name="keywords" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Description">Description</label>
                                    <input class="form-control" id="Description" type="text" name="description" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="image">Image</label>
                                    <div class="input-group">
                                        <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('image').click()">Choose File</button>
                                        <input type="text" class="form-control" id="file-name-placeholder" placeholder="No file chosen" readonly onclick="document.getElementById('image').click()">
                                    </div>
                                    <input type="file" id="image" name="image" accept="image/*" class="d-none" onchange="document.getElementById('file-name-placeholder').value = this.files[0] ? this.files[0].name : 'No file chosen'">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="status">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="">Choose Status</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                    </select>
                                </div>

                            </div> <div class="d-flex justify-content-end mt-4">
                                <button class="btn btn-primary" type="submit">
                                    <i class="bi bi-send" aria-hidden="true"></i> Submit Form
                                </button>
                            </div>

                        </div> </form>

                </div>
            </section>

        </div>
    </main>
@endsection
