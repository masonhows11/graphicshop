<?php

namespace App\Http\Livewire\Front\Cart;

use Livewire\Component;

class CartHeader extends Component
{

    public $cartCount = null;
    public $cartItemsCount = null;


    public function mount(){
        
    }


    protected $listeners = [
        'addToCart' => 'incrementCartCount',
        'removeFromCart' => 'decrementCartCount'
    ];

    public function incrementCartCount($count){

        $this->cartItemsCount += $count;
    }

    public function decrementCartCount($count)
    {
        $this->cartItemsCount -= $count;
    }


    public function render()
    {
        return view('livewire.front.cart.cart-header');
    }
}
