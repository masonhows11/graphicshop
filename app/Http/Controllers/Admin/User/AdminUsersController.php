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
        try {
            $user = User::create($validatedData);
            session()->flash('success', __('messages.New_record_saved_successfully'));
            return redirect()->route('admin.users.index');
        } catch (\Exception $ex) {
            session()->flash('success', __('messages.An_error_occurred_while_created'));
            return redirect()->back();
        }


    }

    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(EditUserRequest $request)
    {
        $validatedData = $request->validated();


        try {
            $user = User::find($request->id);
            $user->update($validatedData);
            session()->flash('success', __('messages.The_update_was_completed_successfully'));
            return redirect()->route('admin.users.index');
        } catch (\Exception $ex) {
            session()->flash('success', __('messages.An_error_occurred_while_updated'));
            return redirect()->back();
        }

    }
}
