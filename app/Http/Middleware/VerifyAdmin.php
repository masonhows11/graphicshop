<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VerifyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            $auth_admin = User::where('email','=',Auth::user()->email)->where('role','=','admin')->first();
            if( $auth_admin->email_verified_at != null )
            return $next($request);
        }
        return  redirect()->route('admin.login.form')->with(['error','کاربر گرامی ابتدا وارد سایت شوید.']);




    }
}
