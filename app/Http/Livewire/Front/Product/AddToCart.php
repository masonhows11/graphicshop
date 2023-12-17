<?php

namespace App\Http\Livewire\Front\Product;

use App\Http\Livewire\Front\Cart\CartHeader;
use App\Models\Basket;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::check()) {
            $basketCount = Basket::where('product_id', $id)
                ->where('user_id',Auth::id())
                ->first();
            if (!$basketCount) {

            } else {

            }

            $this->emitTo(CartHeader::class, 'addToCart', $this->number);
        } else {
            return redirect()->route('auth.login.form');
        }


    }

    public function render()
    {
        return view('livewire.front.product.add-to-cart')
            ->with(['product' => $this->product]);
    }
}
