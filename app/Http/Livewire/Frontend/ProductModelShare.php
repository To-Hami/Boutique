<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;

class ProductModelShare extends Component
{

    public $productModelCount = false;
    public $productModel = [];
    public $Quantity = [1];

    protected $listeners = ['showProductModelAction'];

    public function showProductModelAction($slug)
    {

        $this->productModelCount = true;
        $this->productModel = Product::withAvg('reviews' , 'rating')
            ->whereSlug($slug)->Active()->HasQuantity()
            ->ActiveCategory()->firstOrFail();
    }

    public function render()
    {
        return view('livewire.frontend.product-model-share');
    }
}
