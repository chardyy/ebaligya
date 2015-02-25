<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$user = new User;
        $user->firstname = 'Richard';
        $user->lastname = 'Orofeo';
        $user->email = 'rborofeo@gmail.com';
        $user->password = Hash::make('richard');

        $user->save();

	}

}