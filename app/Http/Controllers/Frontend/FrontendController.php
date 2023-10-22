<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class FrontendController extends Controller
{


   public function index() {
        $newProducts = Product::with(['productImages', 'productVariants'])->where("isNew", 1)->inRandomOrder()->limit(5)->get();
        $popularProducts = Product::with(['productImages', 'productVariants'])->where("isPopular", 1)->inRandomOrder()->limit(5)->get();
        $categories = Category::limit(4)->get();
        return view("frontend.index", compact("newProducts", "popularProducts", "categories"));
   }

   public function categories() {
        $categories = Category::all();
        return view('frontend.categories', compact('categories'));
   }

   public function products() {
          $products = Product::with(["productVariants", "productImages"])->paginate(12);
          $startIndex = ($products->currentPage() - 1) * $products->perPage() + 1;
          $endIndex = min($startIndex + $products->perPage() - 1, $products->total());
          return view('frontend.products', compact('products', 'startIndex', 'endIndex'));
   }

    public function productView($product_slug) {
        $product = Product::where("slug", $product_slug )->first();
        return view("frontend.product.view", compact("product"));
    }

}
