<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $role_client = new Role();
        $role_client->name = 'client';
        $role_client->description = 'A Client User';
        $role_client->save();

        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'An Admin User';
        $role_admin->save();

        $role_admin = new Role();
        $role_admin->name = 'super admin';
        $role_admin->description = 'A Super Admin User';
        $role_admin->save();
    }
}
