<?php

namespace App\Http\Livewire\Front\Cart;


use App\Models\Basket;
use Livewire\Component;

class CartHeader extends Component
{


    public $cartItemsCount = null;


    public function mount()
    {
        $this->cartItemsCount = Basket::count();
    }

    protected $listeners = [
        'addToCart' => 'incrementCartCount',
    ];

    public function incrementCartCount($count){

        $this->cartItemsCount += $count;
    }



    public function render()
    {
        return view('livewire.front.cart.cart-header')
            ->with([ 'cartCount' => $this->cartItemsCount ]);
    }
}
