<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'name' => 'Ahmed Almabhoh',
            'email' => 'az540546@gmail.com',
            'age' => '21',
            'pin' => '9876543210',
            'phone' => '9876543210',
            'status' => true,
            'bio' => 'This is admin Ahmad',
            'password' => Hash::make('password'), 
            'image' => '1644846371_admin_.jpg',
        ]);
    }
}
