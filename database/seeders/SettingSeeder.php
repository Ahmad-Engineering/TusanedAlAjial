<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // ADMIN SETTINGS
        Setting::create([
            'type' => 'profile-status',
            'position' => 'admin'
        ]);

        Setting::create([
            'type' => 'follower-status',
            'position' => 'admin'
        ]);

        Setting::create([
            'type' => 'following-status',
            'position' => 'admin'
        ]);

        Setting::create([
            'type' => 'follower-status-no',
            'position' => 'admin'
        ]);

        Setting::create([
            'type' => 'following-status-no',
            'position' => 'admin'
        ]);

        Setting::create([
            'type' => 'email',
            'position' => 'admin'
        ]);

        Setting::create([
            'type' => 'phone',
            'position' => 'admin'
        ]);

        Setting::create([
            'type' => 'age',
            'position' => 'admin'
        ]);



        // USER SETTINGS
        // Setting::create([
        //     'type' => 'profile-status',
        //     'position' => 'user'
        // ]);
    }
}
