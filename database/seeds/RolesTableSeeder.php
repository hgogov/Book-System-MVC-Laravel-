<?php

use App\Role;
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
        Role::create(array(
            'role' => 'admin'
        ));
        Role::create(array(
           'role' => 'common_user'
        ));
    }
}
