<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionHeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('landing_section')->insert([
        	[
        		'hero_title' => 'Buat project dengan jasa kami',
        		'hero_description' => 'Terbukti & terpercaya',
        		'hero_image' => 'hero/default.png',
        		'company_name' => 'JokiPoject',
        		'company_logo' => 'default.png',
        		'about_us' => 'Kami adalah kami kamu adalah kamu'
        	]
        ]);
    }
}
