<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list jenisperalatans']);
        Permission::create(['name' => 'view jenisperalatans']);
        Permission::create(['name' => 'create jenisperalatans']);
        Permission::create(['name' => 'update jenisperalatans']);
        Permission::create(['name' => 'delete jenisperalatans']);

        Permission::create(['name' => 'list komponens']);
        Permission::create(['name' => 'view komponens']);
        Permission::create(['name' => 'create komponens']);
        Permission::create(['name' => 'update komponens']);
        Permission::create(['name' => 'delete komponens']);

        Permission::create(['name' => 'list pemeliharaans']);
        Permission::create(['name' => 'view pemeliharaans']);
        Permission::create(['name' => 'create pemeliharaans']);
        Permission::create(['name' => 'update pemeliharaans']);
        Permission::create(['name' => 'delete pemeliharaans']);

        Permission::create(['name' => 'list pemeriksaans']);
        Permission::create(['name' => 'view pemeriksaans']);
        Permission::create(['name' => 'create pemeriksaans']);
        Permission::create(['name' => 'update pemeriksaans']);
        Permission::create(['name' => 'delete pemeriksaans']);

        Permission::create(['name' => 'list peralatantelemetris']);
        Permission::create(['name' => 'view peralatantelemetris']);
        Permission::create(['name' => 'create peralatantelemetris']);
        Permission::create(['name' => 'update peralatantelemetris']);
        Permission::create(['name' => 'delete peralatantelemetris']);

        Permission::create(['name' => 'list settings']);
        Permission::create(['name' => 'view settings']);
        Permission::create(['name' => 'create settings']);
        Permission::create(['name' => 'update settings']);
        Permission::create(['name' => 'delete settings']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
