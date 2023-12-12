<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    //

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request){

    }

    public function edit(User $user)
    {
            return view('admin.users.edit');
    }

    public function update(Request $request)
    {

    }
}
