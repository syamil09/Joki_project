<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
        	[
                'image' => 'service_web.png',
        		'title' => 'Website Design and Development',
        		'description' => 'We focus on Website Development,Web Backend Development, CSS Design for Website and etc',
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => date('Y-m-d H:i:s')
        	],
        	[  
                'image' => 'service_web.png',
        		'title' => 'Software Design and Development',
        		'description' => 'We focus on Software Development for Desktop, EDC, Point of Sale and etc',
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => date('Y-m-d H:i:s')
        	],
        	[
                'image' => 'service_web.png',
        		'title' => 'Android App Development',
        		'description' => 'We focus on Android Development use Java & Kotlin',
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => date('Y-m-d H:i:s')
        	],
        ]);
    }
}
