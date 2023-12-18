<?php

namespace App\Http\Livewire\Front\Cart;


use App\Models\Basket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShoppingCart extends Component
{


    public $user_id;
    public $item_id;
    public $cartNumber = 1;

    public function mount()
    {
       $this->user_id = Auth::id();
    }

    //    public function remove($itemId)
    //    {
    //        //  $this->emitTo(CartHeader::class, 'addToCart', $this->cartNumber);
    //        // $this->emitTo(CartHeader::class, 'removeFromCart', $this->cartNumber);
    //    }

    public function deleteConfirmation($id)
    {
        $this->item_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    protected $listeners = [
        'deleteConfirmed' => 'deleteModel',
    ];
    public function deleteModel()
    {
        try {
            $model = Basket::findOrFail($this->item_id);
            $model->delete();
            $this->emitTo(CartHeader::class, 'removeFromCart', $this->cartNumber);
            $this->dispatchBrowserEvent('show-result',
                ['type' => 'success',
                    'message' => __('messages.The_deletion_was_successful')]);

        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('show-result',
                ['type' => 'error',
                    'message' => __('messages.An_error_occurred')]);
        }
    }

    public function render()
    {
        return view('livewire.front.cart.shopping-cart')
            ->extends('front.layouts.master_front')
            ->section('main_content')
            ->with(['cartItems' => Basket::where('user_id', $this->user_id)->get()
                ,'total_price' => array_sum(array_column(Basket::where('user_id', $this->user_id)->get()->toArray(),'price'))]);
    }
}
