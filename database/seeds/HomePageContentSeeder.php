<?php

use App\HomePageContent;
use Illuminate\Database\Seeder;

class HomePageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $general = HomePageContent::create([
            'banner1_title1' => "Online tutoring",
            'banner1_title2' => "that delivers results",
            'banner1_description' => "Keep your child’s studies on track with interactive online lessons",
            'school_count' => "500+",
            'review_count' => "171,916",
            'note_count' => "1m+",
            'banner2_title' => "About Course",
            'banner2_description' => "Only one in eight tutors who apply make it on to our platform, and you can choose the best match for your child. They’re all subject experts from top UK unis, and we choose only those who’ll do the best job.",
            'resources_title' => "Free study resources",
            'resources_description' => "Over a million students use our free resources to help them with their homework.",
            'google_description1' => "Take a look at our Google reviews here, if you would like to see what our customers thought of our service!",
            'google_description2' => "Book a free meeting with a tutor today and find out how they can help your child"
        ]);
    }
}
