<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminAdminsController extends Controller
{
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
