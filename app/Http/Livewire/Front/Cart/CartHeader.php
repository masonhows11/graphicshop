<?php

namespace App\Http\Livewire\Front\Cart;


use App\Models\Basket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartHeader extends Component
{

    public $cartItemsCount = null;
    public function mount()
    {
        if (Auth::check()) {
            $this->cartItemsCount = Basket::count();
        }
    }
    protected $listeners = [
        'addToCart' => 'incrementCartCount',
        'removeFromCart' => 'decrementCartCount'
    ];
    public function incrementCartCount( $count)
    {
        if (Auth::check()) {
            $this->cartItemsCount += $count;
            return null;
        } else {
            return redirect()->route('auth.login.form');
        }
    }

    public function decrementCartCount($count)
    {
        $this->cartItemsCount -= $count;
    }


    public function render()
    {
        return view('livewire.front.cart.cart-header')
            ->with(['cartCount' => $this->cartItemsCount]);
    }
}
