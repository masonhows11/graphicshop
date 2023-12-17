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
        $this->product_id = $this->product->id;

    }


    public function addToCart($id)
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $basket = Basket::where('product_id', $id)->where('user_id' , $user_id)->first();
            if (!$basket) {
                $product = Product::findOrFail($id);
                Basket::create([
                    'user_id' => $user_id,
                    'product_id' => $product->id,
                    'product_title' => $product->title,
                    'demo_url' => $product->demo_url,
                    'price' => $product->price,
                    'number' => $this->number
                ]);
                $this->dispatchBrowserEvent('show-result',
                    ['type' => 'success',
                        'message' => __('messages.the_product_has_been_added_to_the_cart')]);
                $this->emitTo(CartHeader::class, 'addToCart', $this->product_id,$this->number);
            } else {
                $this->dispatchBrowserEvent('show-result',
                    ['type' => 'warning',
                        'message' => __('messages.this_product_has_already_been_added_to_the_cart')]);
            }
            return null;
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
