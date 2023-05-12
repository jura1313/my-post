<?php

namespace Database\Seeders;
use App\Models\Content;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'Jura',
            'fullname' => 'Jundi Rochmatul Aziz',
            'email' => 'jura@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'username' => 'Jundi',
            'fullname' => 'Jundi Rochmatul Aziz',
            'email' => 'jundi@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'user'
        ]);

        DB::table('users')->insert([
            'username' => 'Jun',
            'fullname' => 'Jundi Rochmatul Aziz',
            'email' => 'jun@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'user'
        ]);
    }
}
