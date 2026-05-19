@extends('layouts.home')

@section('title', 'Ana Sayfa | Electro')

@section('content')

    @include('front.slider')
    @include('front.services')
    @include('front.offer_banner')
    @include('front.products_tab')
    @include('front.mid_banner')
    @include('front.product_carousel')
    @include('front.bestseller')

@endsection
