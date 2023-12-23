<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProduct extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $delete_id;

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    protected $listeners = [
        'deleteConfirmed' => 'deleteProduct',
    ];

    public function deleteProduct()
    {
        $product = Product::findOrFail($this->delete_id);

        try {
            if ($product->thumbnail_path != null) {
                Storage::disk('public')->delete($product->thumbnail_path);
            }
            if ($product->demo_url != null  )
            {
                Storage::disk('public')->delete($product->demo_url);
            }
            if ($product->source_url != null )
            {

                if (Storage::disk('local_storage')->exists($product->source_url)) {
                  //  dd('yes');
                   Storage::disk('local_storage')->delete($product->source_url);
                }
               // dd('no');
            }
            $product->delete();
            $this->dispatchBrowserEvent('show-result',
                ['type' => 'success',
                    'message' => __('messages.The_deletion_was_successful')]);

        } catch (\Exception $ex) {
            session()->flash('error', __('messages.The_desired_record_does_not_exist'));
        }
        return null;
    }


    public function changeState($id)
    {
        try {
            $product = Product::findOrFail($id);
            if ($product->status == 0) {
                $product->status = 1;
                $this->status = 1;
            } else {
                $product->status = 0;
                $this->status = 0;
            }
            $product->save();

            $this->dispatchBrowserEvent('show-result',
                ['type' => 'success',
                    'message' => __('messages.The_changes_were_made_successfully')]);
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('show-result',
                ['type' => 'error',
                    'message' => __('messages.An_error_occurred')]);
        }
    }

    public function render()
    {
        return view('livewire.admin.product.admin-product')
            ->extends('admin.include.master_dash')
            ->section('dash_main_content')
            ->with(['products' => Product::paginate(10)]);
    }
}
