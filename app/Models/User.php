<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
        protected $fillable = [
            'auth_type',
            'name',
            'role',
            'first_name',
            'last_name',
            'subscribe_news',
            'national_code',
            'email',
            'mobile',
            'email_verified_at',
            'mobile_verified_at',
            'token',
            'token_guid',
        ];
       /* protected $fillable = [
            'name',
            'first_name',
            'last_name',
            'email',
            'mobile',
            'role',
            'national_code',

        ];*/

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function payments(){

        return $this->hasMany(Payment::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'user_id');
    }
    public function getFullNameAttribute(){
        return $this->first_name . ' ' . $this->last_name;
    }
    public function product(){
        return $this->hasMany(Product::class,'user_id');
    }

    //    public function getPermissionIds(){
    //
    //        return $this->permissions->pluck('id');
    //    }
    //
    //    public static function getRoleIds()
    //    {
    //        return Role::all()->pluck('id');
    //    }
}
