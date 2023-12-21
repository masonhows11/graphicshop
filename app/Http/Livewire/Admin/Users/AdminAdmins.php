<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAdmins extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $delete_id;
    public $stateUser = true;
    public function activeUser($id)
    {
        $user = User::find($id);
        if ($user->activate == 0) {
            $user->activate = 1;
            $user->save();
            $this->stateUser = true;
        } else {
            $user->activate = 0;
            $user->save();
            $this->stateUser = false;
        }
        $this->dispatchBrowserEvent('show-result',
            ['type' => 'success',
                'message' => __('messages.The_update_was_completed_successfully')]);
    }

    // step 1 : confirm delete alert
    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }
    // step 2 : add confirm listener
    protected $listeners = [
        'deleteConfirmed' => 'deleteUser',
    ];
    // step 3 : delete model on listener
    public function deleteUser()
    {
        session()->flash('warning',__('messages.It_is_not_possible_to_delete'));
        return redirect()->route('admin.admins.index');
       /*
        try {
            User::destroy($this->delete_id);
            $this->dispatchBrowserEvent('show-result',
                ['type' => 'success',
                    'message' => __('messages.The_deletion_was_successful')]);
        } catch (\Exception $ex) {
            return view('errors_custom.model_not_found');
        }
        return  null;*/
    }
    public function render()
    {
        return view('livewire.admin.users.admin-admins')
            ->extends('admin.include.master_dash')
            ->section('dash_main_content')
            ->with(['users' => User::where('role','admin')->paginate(8)]);
    }
}
