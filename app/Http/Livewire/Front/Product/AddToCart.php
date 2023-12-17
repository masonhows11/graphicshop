<?php

namespace App\Http\Livewire\Front\Product;

use App\Http\Livewire\Front\Cart\CartHeader;
use App\Models\Basket;
use App\Models\Product;
use Livewire\Component;

class AddToCart extends Component
{

    public $product;
    public $product_id;
    public $number = 1;

    public function mount($product_id)
    {
        $this->product = Product::findOrfail($product_id);

    }


    public function addToCart($id)
    {
       $basketCount =   Basket::where('product_id', $id)->get();
       if($basketCount->isEmpty()){

       }else{

       }

        $this->emitTo(CartHeader::class, 'addToCart', $this->number);
    }

    public function render()
    {
        return view('livewire.front.product.add-to-cart')
            ->with(['product' => $this->product]);
    }
}
