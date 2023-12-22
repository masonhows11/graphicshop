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
        $auth_admin = DB::table('users')
            ->where('email',Auth::user()->email ?? null)
            ->where('role','admin')->first();
        if( $auth_admin->email_verified_at == null )
        {
            return  redirect()->route('admin.login.form')
                ->with(['error','کاربر گرامی ابتدا وارد سایت شوید.']);
        }

        return $next($request);


    }
}
