<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreateUserRequest;
use App\Http\Requests\Admin\User\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    //

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $validatedData = $request->validated();
    }

    public function edit(User $user)
    {
        return view('admin.users.edit',['user' => $user]);
    }

    public function update(EditUserRequest $request)
    {
        $validatedData = $request->validated();

    }
}
