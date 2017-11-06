<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $role_client = Role::where('name', 'client')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $client = new User();
        $client->name = 'Client Name';
        $client->email = 'client@example.com';
        $client->password = bcrypt('secret');
        $client->verified = '1';
        $client->save();
        $client->credit()->create(['count' => 0]);
        $client->roles()->attach($role_client);

        $admin = new User();
        $admin->name = 'Admin Name';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('secret');
        $admin->verified = '1';
        $admin->save();
        $admin->credit()->create(['count' => 0]);
        $admin->roles()->attach($role_admin);
    }
}
