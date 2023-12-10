<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        // create users
        $users = [
            [
                'name' => 'mason11',
                'first_name' => 'mason',
                'last_name' => 'howsHows',
                'email' => 'mason.hows11@gmail.com',
                'password' => Hash::make('1289..//')
            ],
            [
                'name' => 'sara1992',
                'first_name' => 'sara',
                'last_name' => 'redField',
                'email' => 'sara1992@gmail.com',
                'password' => Hash::make('1289..//'),
            ],
            [
                'name' => 'james',
                'first_name' => 'joe',
                'last_name' => 'james',
            ],
            [
                'name' => 'nicky',
                'first_name' => 'nick',
                'last_name' => 'wilson',
            ],
            [
                'name' => 'Mary',
                'first_name' => 'maria',
                'last_name' => 'watson',
            ],
            [
                'name' => 'John97',
                'first_name' => 'John',
                'last_name' => 'marston',
            ],
            [
                'name' => 'David',
                'first_name' => 'David120',
                'last_name' => 'Bombal',
            ],
            [
                'name' => 'nicky',
                'first_name' => 'nick',
                'last_name' => 'wilson',
                'email' => 'nicky.wilson21@gmail.com',
                'password' => Hash::make('1289..//**'),
                'mobile' => '09917230929',
            ],
            [
                'name' => 'Mary',
                'first_name' => 'maria',
                'last_name' => 'watson',
                'email' => 'mary.watson90@gmail.com',
                'password' => Hash::make('1289..//**'),
                'mobile' => '09917230925',
            ],
            [
                'name' => 'John97',
                'first_name' => 'John',
                'last_name' => 'marston',
                'email' => 'john.marston1870@gmail.com',
                'password' => Hash::make('1289..//**'),
                'mobile' => '09917230922',
            ],
            [
                'name' => 'David',
                'first_name' => 'David120',
                'last_name' => 'Bombal',
                'email' => 'david.bombal11@gmail.com',
                'password' => Hash::make('1289..//**'),
                'mobile' => '09917230911',
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
