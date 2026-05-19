@extends('layouts.admin')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-primary">
                        <div class="inner"><h3>150</h3><p>New Orders</p></div>
                        <i class="small-box-icon bi bi-bag-plus"></i>
                        <a href="#" class="small-box-footer link-light">More info <i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 connectedSortable">
                    <div class="card mb-4">
                        <div class="card-header"><h3 class="card-title">Sales Value</h3></div>
                        <div class="card-body"><div id="revenue-chart"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
