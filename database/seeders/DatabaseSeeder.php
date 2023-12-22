<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // admin 1  has  super_admin role
        $admin1 = Admin::create([
            'name' => 'naeem_soltany',
            'first_name' => 'naeem',
            'last_name' => 'soltany',
            'mobile' => '09917230927',
            'email' => 'mason.hows11@gmail.com',
            //'token'=>  mt_rand(111111,999999),
            //'token_verified_at' => Carbon::now(),
        ]);

        // admin 2 has admin role
        $admin2 = Admin::create([
            'name' => 'joe_james',
            'first_name' => 'joe',
            'last_name' => 'james',
            'mobile' => '09172890423',
            'email' => 'joe.james556@gmail.com',
            //'token'=>  mt_rand(111111,999999),
            //'token_verified_at' => Carbon::now(),
        ]);

        // admin 3 do not have any admin role
        $admin3 = Admin::create([
            'name' => 'sara137',
            'first_name' => 'sara',
            'last_name' => 'redField',
            'email' => 'sara.ebrahimy@gmail.com',
            //'token'=>  mt_rand(111111,999999),
            //'token_verified_at' => Carbon::now(),
        ]);

         // $role = Role::create(['guard_name' => 'admin', 'name' => 'manager']);
        $super_admin = Role::create(['guard_name' => 'admin', 'name' => 'super_admin']);
        $admin = Role::create(['guard_name' => 'admin', 'name' => 'admin']);
        $admin1->assignRole($super_admin);
        $admin2->assignRole($admin);


        // create users
        $users = [
            [
                'name' => 'james',
                'first_name' => 'joe',
                'last_name' => 'james',
                'role' => 'user',
            ],
            [
                'name' => 'nicky',
                'first_name' => 'nick',
                'last_name' => 'wilson',
                'role' => 'user',
            ],
            [
                'name' => 'Mary',
                'first_name' => 'maria',
                'last_name' => 'watson',
                'role' => 'user',
            ],
            [
                'name' => 'John97',
                'first_name' => 'John',
                'last_name' => 'marston',
                'role' => 'user',
            ],
            [
                'name' => 'David',
                'first_name' => 'David120',
                'last_name' => 'Bombal',
                'role' => 'user',
            ],
            [
                'name' => 'nicky',
                'first_name' => 'nick',
                'last_name' => 'wilson',
                'email' => 'nicky.wilson21@gmail.com',
                'password' => Hash::make('1289..//**'),
                'mobile' => '09917230929',
                'role' => 'user',
            ],
            [
                'name' => 'Mary',
                'first_name' => 'maria',
                'last_name' => 'watson',
                'email' => 'mary.watson90@gmail.com',
                'password' => Hash::make('1289..//**'),
                'mobile' => '09917230925',
                'role' => 'user',
            ],
            [
                'name' => 'John97',
                'first_name' => 'John',
                'last_name' => 'marston',
                'email' => 'john.marston1870@gmail.com',
                'password' => Hash::make('1289..//**'),
                'mobile' => '09917230922',
                'role' => 'user',
            ],
            [
                'name' => 'David',
                'first_name' => 'David120',
                'last_name' => 'Bombal',
                'email' => 'david.bombal11@gmail.com',
                'password' => Hash::make('1289..//**'),
                'mobile' => '09917230911',
                'role' => 'user',
            ],

        ];


        foreach ($users as $user) {
            User::create($user);
        }

        $categories = [
            [
                'title' => 'بنر',
                'status' => 1,
            ],
            [
                'title' => 'کارت ویزیت',
                'status' => 1,
            ],
            [
                'title' => 'تراکت',
                'status' => 1,
            ],
            [
                'title' => 'سربرگ',
                'status' => 1,

            ],


        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
