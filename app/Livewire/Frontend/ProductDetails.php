<?php

namespace App\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;

class ProductDetails extends Component
{
    #[Locked]
    public $product;
    
    public $size_available, $variant_available;

    public $size_change, $variant_change;
    #[Locked] 
    public $globalVariants;

    public $quantity = 1;

    public function mount($slug) {

        $this->product = Product::with(['productImages'])->firstWhere('slug', $slug);
        $this->globalVariants = collect($this->product->productVariants);
        $this->size_available = $this->globalVariants
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

                                $firstSize = $this->globalVariants->pluck("size")->first();
        $this->variant_available = $this->globalVariants
                                    ->where('size', $firstSize)
                                    ->where('quantity', '>', 0)
                                    ->map(function ($item) {
                                        return [
                                            "name" => $item["name"],
                                            "code" => $item["code"],
                                        ];
                                    })
                                    ->values();
    }

    public function increment() {
        $this->quantity++;
    }
    public function decrement() {
        $this->quantity--;
    }

    // #[On('sizeChanging')]
    // public function sizeChanging($size) {
    //     $price_change = $this->globalVariants->firstWhere("size", $size)['selling_price'];
    //     $this->dispatch('sizeChanged', price: $price_change);
    // }
    

    public function order() {
        dd($this->size_change);
    }

    public function render()
    {
        return view('livewire.frontend.product-details')->with([
            "product" => $this->product,
        ])->extends('layouts.app')->section('main');
    }
}
