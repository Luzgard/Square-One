<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder 
{
	public function run()
	{
		DB::table('users')->delete();

		DB::table('users')->insert([
			'name' => 'DENIS Corentin',
			'email' => 'corentin.denis76@outlook.fr',
			'password' => bcrypt('corentin'),
			'admin' => 1
		]);
		DB::table('users')->insert([
			'name' => 'DENIS Corentin (Viacesi)',
			'email' => 'corentin.denis@viacesi.fr',
			'password' => bcrypt('corentin'),
			'admin' => 1
		]);
		DB::table('users')->insert([
			'name' => 'Square One',
			'email' => 'contact@squareone.com',
			'password' => bcrypt('Squ@re'),
			'admin' => 1
		]);
	}
}