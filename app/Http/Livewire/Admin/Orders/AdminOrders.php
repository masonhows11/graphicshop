<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;
use Livewire\WithPagination;

class AdminOrders extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function render()
    {
        return view('livewire.admin.orders.admin-orders')
            ->extends('admin.include.master_dash')
            ->section('dash_main_content');
    }
}
