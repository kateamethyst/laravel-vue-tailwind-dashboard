<?php

use App\Models\Role;
use App\Models\User;
use App\Models\Client;
use App\Models\Resume;
use App\Models\SkillSet;
use App\Models\JobOpening;
use App\Models\Permission;
use App\Models\JobIndustry;
use App\Models\JobInterview;
use App\Models\ClientIndustry;
use App\Models\JobApplication;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionTableSeeder extends Seeder
{
    private $candidateAccess = [
        JobOpening::class => ['read'],
        JobIndustry::class => ['read'],
        Resume::class => ['manage'],
        SkillSet::Class => ['create', 'read'],
    ];

    private $clientAccess = [
        Client::class => ['read', 'update'],
        ClientIndustry::class => ['read'],
        JobOpening::class => ['manage'],
        JobInterview::class => ['read', 'update'],
        JobApplication::class => ['read']
    ];

    private $adminAccess = [
        Client::class => ['manage'],
        ClientIndustry::class => ['manage'],
        JobApplication::class => ['manage'],
        JobInterview::class => ['manage'],
        JobOpening::class => ['manage'],
        Resume::class => ['manage'],
        SkillSet::class => ['manage']
    ];

    private $superAdminAccess = [
        Client::class => ['manage'],
        ClientIndustry::class => ['manage'],
        JobApplication::class => ['manage'],
        JobIndustry::class => ['manage'],
        JobInterview::class => ['manage'],
        JobOpening::class => ['manage'],
        Permission::class => ['manage'],
        Resume::class => ['manage'],
        Role::class => ['manage'],
        SkillSet::class => ['manage'],
        User::class => ['manage']
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $superAdminRole = Role::firstOrCreate(['name' => 'SuperAdmin']);
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $clientRole = Role::firstOrCreate(['name' => 'Client']);
        $candidateRole = Role::firstOrCreate(['name' => 'Candidate']);

        
        foreach($this->superAdminAccess as $superAdmin => $permission) {
            foreach($permission as $key => $value) {
                $modelPath = explode('\\', $superAdmin, 3);
                $modelName = strtolower(Str::plural(Str::slug(str_replace('\\', '-', $modelPath[2]))));
                $permission = Permission::findOrCreate('superadmin-' . $value . '-' . $modelName);

                $superAdminRole->givePermissionTo($permission);
            }
        }

        foreach($this->adminAccess as $admin => $permission) {
            foreach($permission as $key => $value) {
                $modelPath = explode('\\', $admin, 3);
                $modelName = strtolower(Str::plural(Str::slug(str_replace('\\', '-', $modelPath[2]))));
                $permission = Permission::findOrCreate('admin-' . $value . '-' . $modelName);

                $adminRole->givePermissionTo($permission);
            }
        }

        foreach($this->clientAccess as $client => $permission) {
            foreach($permission as $key => $value) {
                $modelPath = explode('\\', $client, 3);
                $modelName = strtolower(Str::plural(Str::slug(str_replace('\\', '-', $modelPath['2']))));
                $permission = Permission::findOrCreate('client-' . $value . '-' . $modelName);

                $clientRole->givePermissionTo($permission);
            }
        }

        foreach($this->candidateAccess as $candidate => $permission) {
            foreach($permission as $key => $value) {
                $modelPath = explode('\\', $candidate, 3);
                $modelName = strtolower(Str::plural(Str::slug(str_replace('\\', '-', $modelPath['2']))));
                $permission = Permission::findOrCreate('candidate-'. $value . '-' . $modelName);

                $candidateRole->givePermissionTo($permission);
            }
        }
    }
}
