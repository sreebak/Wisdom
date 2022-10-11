<?php

use Illuminate\Database\Seeder;
use App\Privacypolicy;

class PrivacyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $privacy = Privacypolicy::create([
            'policy' => ""
        ]);
    }
}
