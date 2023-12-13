<?php

namespace App\Http\Livewire\Admin\Payments;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class AdminPayments extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function render()
    {
        return view('livewire.admin.payments.admin-payments')
            ->extends('admin.include.master_dash')
            ->section('dash_main_content')
            ->with(['payments' => Payment::paginate(10)]);
    }
}
