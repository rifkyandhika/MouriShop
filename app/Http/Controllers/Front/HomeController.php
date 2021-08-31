<?php

namespace App\Http\Controllers\Front;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {

        $products = Product::inRandomOrder()->get();

        return view('front.index', compact('products'));
    }

    public function product($id) {

        $product = Product::where('id', $id)->first();

        return view('front.product.index', compact('product'));
    }
}
