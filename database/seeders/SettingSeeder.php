<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = array(
            ['key' => 'logo', 'value' => 'https://1000logos.net/wp-content/uploads/2016/10/Apple-Logo.png','type' => 'file'],
            ['key' => 'fav_icon', 'value' => 'https://1000logos.net/wp-content/uploads/2016/10/Apple-Logo.png','type' => 'file'],
            ['key' => 'preloader', 'value' => 'https://1000logos.net/wp-content/uploads/2016/10/Apple-Logo.png','type' => 'file'],
            ['key' => 'banner', 'value' => 'https://1000logos.net/wp-content/uploads/2016/10/Apple-Logo.png','type' => 'file'],
            ['key' => 'name', 'value' => 'FSTORE','type' => 'text'],
            ['key' => 'slogan', 'value' => 'stay with fstore','type' => 'text'],
            ['key' => 'title', 'value' => 'fstore','type' => 'text'],
            ['key' => 'address', 'value' => 'Dhaka,Bangladesh ','type' => 'text'],
            ['key' => 'email', 'value' => 'support@fstore.com','type' => 'text'],
            ['key' => 'phone', 'value' => '8801307788699','type' => 'text'],
            ['key' => 'schedule', 'value' => 'Fri to Fri : 18:00 - 18:00','type' => 'text'],
            ['key' => 'facebook', 'value' => 'https://www.facebook.com/fstore','type' => 'socials'],
            ['key' => 'linkdin', 'value' => 'https://www.linkdin.com/fstore','type' => 'socials'],
            ['key' => 'twitter', 'value' => 'https://www.twitter.com/fstore','type' => 'socials'],
        );


        foreach ($settings as $setting) {
            Setting::updateOrCreate($setting);
        }

    }
}
