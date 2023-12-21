<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class AdminAdmins extends Component
{
    public function render()
    {
        return view('livewire.admin.users.admin-admins')
            ->extends('admin.include.master_dash')
            ->section('dash_main_content')
            ->with(['users' => User::where('role','admin')->paginate(8)]);
    }
}
