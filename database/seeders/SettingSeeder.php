<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

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
        	'site_name' => "Laravel Blog",
        	'address' => "Jakarta",
        	'contact_number' => '088888118181',
        	'contact_email' => 'contact@laravelblog.com',
            'about_us' => 'Hello this is about us'

        ]);
    }
}
