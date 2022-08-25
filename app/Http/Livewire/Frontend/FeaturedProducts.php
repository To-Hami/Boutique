<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;

class FeaturedProducts extends Component
{
    public function render()
    {
        $featured_products = Product::with('media')
            ->inRandomOrder()->featured()->Active()->HasQuantity()
            ->ActiveCategory()->take(8)->get();

        return view('livewire.frontend.featured-products',compact('featured_products'));
    }
}
