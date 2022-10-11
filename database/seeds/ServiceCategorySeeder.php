<?php

use App\SerCatg;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SerCatg::create([
            'catg_name'=>'home',
            'url_slug'=>'service_category_home',
            'disp_order'=>1
        ]);
        SerCatg::create([
            'catg_name'=>'howitworks',
            'url_slug'=>'service_category_howitworks',
            'disp_order'=>2
        ]);
        SerCatg::create([
            'catg_name'=>'corporates',
            'url_slug'=>'service_category_corporates',
            'disp_order'=>3
        ]);
        SerCatg::create([
            'catg_name'=>'tutor',
            'url_slug'=>'service_category_tutor',
            'disp_order'=>4
        ]);
        SerCatg::create([
            'catg_name'=>'about',
            'url_slug'=>'service_category_about',
            'disp_order'=>5
        ]);
    }
}
