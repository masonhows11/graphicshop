<?php

namespace App\Services\ValidateUserAdminService;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;


class ValidateAdminEmail
{
    public static function checkAdminToken($code,$email)
    {
        try {
            $admin = User::where('email',$email)->where('token',$code)->first();
            $expired = Carbon::parse($admin->updated_at)->addMinutes(3)->isPast();
            if($expired == 1){
                return false;
            }
            $admin->email_verified_at = Date::now();
            $admin->activate = 1;
            $admin->save();
            return true;
        }catch (\Exception $ex){
            return view('errors_custom.validation_error')
                ->with(['error'=>$ex->getMessage()]);
        }
    }

}
