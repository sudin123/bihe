<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
              'name'=>'Sudin',
              'email'=>'sudingrng@gmail.com',
              'password'=>bcrypt('123456'),
          ]);
    }
}
