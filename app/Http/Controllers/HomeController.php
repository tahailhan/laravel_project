<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {

        $products = Product::latest()->take(6)->get();

        return view('front.index', compact('products'));
    }

    public function productDetail($id)
    {
        $product = Product::findOrFail($id);

        return view('front.product_detail', compact('product'));
    }
}
