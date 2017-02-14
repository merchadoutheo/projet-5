<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 DB::table('users')->insert([
			'name' => 'Merchadou Théo',
			'email' => 'merchadou@bmvcom.eu',
			'role' => 2,
			'password' => bcrypt('mdp')
        ]);
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 25)->create();
    }
}
