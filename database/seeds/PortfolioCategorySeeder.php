<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portfolio_categories')->insert([
        	[
        		'name' => 'web',
        		'created_at' => date('Y-m-d'),
        		'updated_at' => date('Y-m-d'),
        	],
        	[
        		'name' => 'mobile',
        		'created_at' => date('Y-m-d'),
        		'updated_at' => date('Y-m-d'),
        	],
        	[
        		'name' => 'desktop',
        		'created_at' => date('Y-m-d'),
        		'updated_at' => date('Y-m-d'),
        	],
        ]);
    }
}
