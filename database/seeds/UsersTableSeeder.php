<?php

use App\Models\Role;
use App\Models\User;
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
        $admin = new User([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@siocareer.com',
            'password' => bcrypt('admin123'),
            'type' => User::TYPE_SUPERADMIN
        ]);

        $admin->save();
        $admin->assignRole(Role::whereName('SuperAdmin')->first());

        $staff = new User([
            'first_name' => 'Staff',
            'last_name' => 'Staff',
            'email' => 'staff@siocareer.com',
            'password' => bcrypt('staff123'),
            'type' => User::TYPE_ADMIN
        ]);

        $staff->save();
        $staff->assignRole(Role::whereName('Admin')->first());

        $candidate = new User([
            'first_name' => 'Candidate',
            'last_name' => 'Candidate',
            'email' => 'candidate@siocareer.com',
            'password' => bcrypt('candidate123'),
            'type' => User::TYPE_CANDIDATE
        ]);

        $candidate->save();
        $candidate->assignRole(Role::whereName('Candidate')->first());

        $client = new User([
            'first_name' => 'Client',
            'last_name' => 'Client',
            'email' => 'client@siocareer.com',
            'password' => bcrypt('client123'),
            'type' => User::TYPE_CLIENT
        ]);

        $client->save();
        $client->assignRole(Role::whereName('Client')->first());
    }
}
