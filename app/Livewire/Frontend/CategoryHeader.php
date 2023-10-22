<?php

namespace App\Livewire\Frontend;

use App\Models\Category;
use Livewire\Component;

class CategoryHeader extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.frontend.category-header', [
            'categories' => $categories
        ]);
    }
}
