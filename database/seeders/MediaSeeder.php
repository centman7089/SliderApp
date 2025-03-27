<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('media')->insert([
            [
                'title' => 'Nature Image 1',
                'file_path' => 'storage/media/image1.jpg',
                'type' => 'image',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Nature Image 2',
                'file_path' => 'storage/media/image2.jpg',
                'type' => 'image',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Landscape Image 3',
                'file_path' => 'storage/media/image3.jpg',
                'type' => 'image',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Sample Video 1',
                'file_path' => 'storage/media/video1.mp4',
                'type' => 'video',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Sample Video 2',
                'file_path' => 'storage/media/video2.mp4',
                'type' => 'video',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
