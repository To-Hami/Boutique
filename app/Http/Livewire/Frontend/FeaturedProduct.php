<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;

class FeaturedProduct extends Component
{
    public function render()
    {
        return view('livewire.frontend.featured-product' , [
          'featured_products' =>  Product::with('media')
                ->inRandomOrder()->featured()->Active()->HasQuantity()
                ->ActiveCategory()->take(4)->get()
        ]);
    }
}
