<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'site_name' => 'My Media App',
                'slider_interval' => 5000, // 5 seconds
                'theme_color' => '#000000', // Default black theme
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'site_name' => 'Video Hub',
                'slider_interval' => 7000, // 7 seconds
                'theme_color' => '#FF5733', // Orange-red theme
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
