<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate table user and user_roles relation table
        //User::truncate();
        //DB::table('role_user')->truncate();

        //Find Role IDs
        $adminRole = Role::where('name','Admin')->first();
        $authorRole = Role::where('name','Author')->first();
        $userRole = Role::where('name','User')->first();

        //Insert User Data
        $admin = User::create([
            'name' => 'Reon Technologies',
            'email' => 'admin@reontel.com',
            'password' => Hash::make('Reon@123')
        ]);

        $author = User::create([
            'name' => 'Website Admin',
            'email' => 'author@reontel.com',
            'password' => Hash::make('12345678')
        ]);

        $user = User::create([
            'name' => 'Client',
            'email' => 'user@reontel.com',
            'password' => Hash::make('123456')
        ]);

        //Assign roles to users
        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
