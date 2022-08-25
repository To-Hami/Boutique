<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
////return "hello";
//        $product_categories = Category::whereStatus(1)->whereNull('parent_id')->get();
////        $featured_products = Product::with('media')
////            ->inRandomOrder()->featured()->Active()->HasQuantity()
////            ->ActiveCategory()->take(8)->get();
//        return view('frontend.index');
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function detail()
    {
        return view('frontend.product');
    }

    public function shop()
    {
        return view('frontend.shop');
    }

}
