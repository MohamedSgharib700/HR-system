<?php

use App\Constants\UserTypes;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var User $user */
       User::create([
            'name' => 'Admin User',
            'email' => 'admin@lodex-solutions.com',
            'password' =>'102030',
            'active' => true,
            'type' => UserTypes::ADMIN
        ]);

    }

}
