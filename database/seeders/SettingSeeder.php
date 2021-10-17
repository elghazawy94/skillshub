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
        Setting::create([
            'email' => 'skillshub@gmail.com',
            'phone' => '01012345000',
            'facebook' => 'https://www.facebook.com/',
            'twitter' => 'https://www.twitter.com/',
            'instegram' => 'https://www.instegram.com/',
            'youtube' => 'https://www.youtube.com/',
            'linkedin' => 'https://www.linkedin.com/'
        ]);
    }
}
