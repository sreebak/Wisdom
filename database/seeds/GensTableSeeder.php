<?php

use Illuminate\Database\Seeder;
use App\Gen;

class GensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ///Insert Gen Data
        $general = Gen::create([
            'webtitle' => "My Website",
            'description' => "",
            'google_analy' => "",
            'keywords' => "",
            'phone1' => "",
            'phone2' => "",
            'email1' => "",
            'email2' => "",
            'website' => "",
            'address' => "",
            'facebook' => "",
            'twitter' => "",
            'linkedin' => "",
            'youtube' => "",
            'google' => ""
        ]);
    }
}
