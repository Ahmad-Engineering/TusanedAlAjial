<?php

namespace Database\Seeders;

use App\Models\AdminSocial;
use Illuminate\Database\Seeder;

class AdminSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AdminSocial::create([
            'facebook' => '#',
            'twitter' => '#',
            'skype' => '#',
            'linkedin' => '#',
            'admin_id' => '1',
        ]);
    }
}
