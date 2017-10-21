<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = \App\Role::create([
              'role' => 'admin'
          ]);
        $role2 = \App\Role::create([
              'role' => 'editor'
          ]);
        $role3 = \App\Role::create([
              'role' => 'applicant'
          ]);
        $role4 = \App\Role::create([
              'role' => 'superadmin'
          ]);
    }
}
