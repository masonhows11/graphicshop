<?php

namespace App\Http\Livewire\Front\Product;

use Livewire\Component;

class AddToCart extends Component
{

    public $product;
    public $product_id;

    public function mount($product_id)
    {

        

    }


    public function addToCart($id)
    {

    }

    public function render()
    {
        return view('livewire.front.product.add-to-cart');
    }
}