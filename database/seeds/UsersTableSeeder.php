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
        $role_super_admin = Role::where('name', 'super admin')->first();

        $i = 1;
        while($i <= 7) {
            $client = new User();
            $client->name = 'Client ' . $i;
            $client->email = 'client' . $i . '@example.com';
            $client->password = bcrypt('secret');
            $client->verified = '0';
            $client->approved = '0';
            $client->save();
            $client->credit()->create(['count' => 3]);
            $client->roles()->attach($role_client);
            $i++;
        }
        while($i <= 14) {
            $client = new User();
            $client->name = 'Client ' . $i;
            $client->email = 'client' . $i . '@example.com';
            $client->password = bcrypt('secret');
            $client->verified = '1';
            $client->approved = '0';
            $client->save();
            $client->credit()->create(['count' => 3]);
            $client->roles()->attach($role_client);
            $i++;
        }
        while($i <= 21) {
            $client = new User();
            $client->name = 'Client ' . $i;
            $client->email = 'client' . $i . '@example.com';
            $client->password = bcrypt('secret');
            $client->verified = '1';
            $client->approved = '1';
            $client->save();
            $client->credit()->create(['count' => 3]);
            $client->roles()->attach($role_client);
            $i++;
        }
        while($i <= 25) {
            $admin = new User();
            $admin->name = 'Admin ' . $i;
            $admin->email = 'admin'  . $i . '@example.com';
            $admin->password = bcrypt('secret');
            $admin->verified = '1';
            $admin->approved = '1';
            $admin->save();
            $admin->credit()->create(['count' => 0]);
            $admin->roles()->attach($role_admin);
            $i++;
        }
    }
}
