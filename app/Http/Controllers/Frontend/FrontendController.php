<?php

namespace App\Http\Controllers\Frontend;


use App\Models\Product;
use App\Models\Category;
use App\Models\Message;
use App\Http\Controllers\Controller;
use Exception;
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

    public function productView($slug) {
     $product = Product::with(['productImages', 'productVariants'])->firstWhere('slug', $slug);
     $globalVariants = collect($product->productVariants);
     $size_available = $globalVariants
                             ->where('quantity', '>', 0) // Mengambil hanya data dengan quantity lebih dari 0
                             ->groupBy('size') // Mengelompokkan data berdasarkan size
                             ->map(function ($items) {
                                 $item = $items->first(); // Mengambil salah satu item dari grup (karena original_price dan selling_price sama dalam grup yang sama)
                                 return [
                                     "size" => $item['size'],
                                     "selling_price" => $item['selling_price'],
                                     "original_price" => $item['original_price'],
                                 ];
                             })
                             ->values();// Menghapus keys dari hasil grup sehingga menghasilkan indeks numerik


     $variant_available = $globalVariants
                                 ->where('quantity', '>', 0)
                                 ->map(function ($item) {
                                     return [
                                        "size" => $item['size'],
                                         "name" => $item["name"],
                                         "code" => $item["code"],
                                     ];
                                 })
                                 ->values();

    $relatedProducts = Product::with(['productImages', 'productVariants'])->where('category_id', $product->category_id)->whereNot('id', $product->id)->get();
    return view("frontend.productview", compact("product", 'size_available', 'variant_available', 'relatedProducts'));
    }

    public function categoryProducts(Category $category) {
        $products = Product::with(['productImages', 'productVariants'])->where('category_id', $category->id)->paginate(12);
        $startIndex = ($products->currentPage() - 1) * $products->perPage() + 1;
        $endIndex = min($startIndex + $products->perPage() - 1, $products->total());
        return view('frontend.categoryproducts', compact('products', 'startIndex', 'endIndex', 'category') );
    }

    public function contact() {
        return view('frontend.contact');
    }

    public function sendMessage(Request $request) {
        try {

            $payload = $request->validate([
                "name" => "required",
                "subject" => "required",
                "phone" => "required|numeric",
                "email" => "email:rfc,dns",
                "message" => "required|string|min:10",
            ]);
            
            $message = new Message;
            $message->name = $payload["name"];
            $message->subject = $payload["subject"];
            $message->email = $payload["email"];
            $message->phone = $payload["phone"];
            $message->message = $payload["message"];
            $message->save();
            
            return response()->json(
                ["status" => "success",
                "title" => "Success",
                "message" => "Message successfully sended"]);
        } catch(Exception $error) {
            return response()->json(
                ["status" => "error",
                "title" => "Something went wrong",
                "message" => $error->getMessage()
                ]);
        }
    }

    public function about() {
        return view('frontend.about');
    }

    public function messages() {
        $messages = Message::latest()->paginate(6);
        return view('frontend.messages', compact('messages'));
    }
}
