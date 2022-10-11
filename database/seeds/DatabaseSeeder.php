<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(GensTableSeeder::class);
        $this->call(PrivacyTableSeeder::class);
        $this->call(TermsTableSeeder::class);
        $this->call(HomePageContentSeeder::class);
        $this->call(ServiceCategorySeeder::class);
    }
}
