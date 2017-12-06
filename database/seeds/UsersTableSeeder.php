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
        while($i < 31) {
            $client = new User();
            $client->name = 'User ' . $i;
            $client->company_name = "My Company";
            $client->contact_number = "+601278903456";
            $client->email = 'user' . $i . '@example.com';
            $client->password = bcrypt('secret');
            $client->verified = rand(0, 1);
            $client->approved = rand(0, 1);
            $client->save();
            $client->credit()->create(['count' => rand(0, 10)]);
            if ($i < 21) {
                $client->roles()->attach($role_client);
            } else if ($i < 25) {
                $client->roles()->attach($role_admin);
            } else if ($i < 31) {
                $client->roles()->attach($role_super_admin);
            }            
            $i++;
        }
    }
}
