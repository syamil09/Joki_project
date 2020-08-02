<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
        	[
        		'name' => 'Dimas',
        		'role' => 'Owner',
        		'photo' => 'default.jpg',
        		'url_instagram' => 'https://www.instagram.com/mikazu48/',
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'name' => 'Paksi',
        		'role' => 'Developer',
        		'photo' => 'default.jpg',
        		'url_instagram' => 'https://www.instagram.com/paksitamtomoaji/',
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'name' => 'Syamil',
        		'role' => 'Developer',
        		'photo' => 'default.jpg',
        		'url_instagram' => 'https://www.instagram.com/syamil_i.m/',
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);
    }
}
