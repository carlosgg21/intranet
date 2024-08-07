<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list addresses']);
        Permission::create(['name' => 'view addresses']);
        Permission::create(['name' => 'create addresses']);
        Permission::create(['name' => 'update addresses']);
        Permission::create(['name' => 'delete addresses']);

        Permission::create(['name' => 'list adtypes']);
        Permission::create(['name' => 'view adtypes']);
        Permission::create(['name' => 'create adtypes']);
        Permission::create(['name' => 'update adtypes']);
        Permission::create(['name' => 'delete adtypes']);

        Permission::create(['name' => 'list announcements']);
        Permission::create(['name' => 'view announcements']);
        Permission::create(['name' => 'create announcements']);
        Permission::create(['name' => 'update announcements']);
        Permission::create(['name' => 'delete announcements']);

        Permission::create(['name' => 'list appsections']);
        Permission::create(['name' => 'view appsections']);
        Permission::create(['name' => 'create appsections']);
        Permission::create(['name' => 'update appsections']);
        Permission::create(['name' => 'delete appsections']);

        Permission::create(['name' => 'list areas']);
        Permission::create(['name' => 'view areas']);
        Permission::create(['name' => 'create areas']);
        Permission::create(['name' => 'update areas']);
        Permission::create(['name' => 'delete areas']);

        Permission::create(['name' => 'list articles']);
        Permission::create(['name' => 'view articles']);
        Permission::create(['name' => 'create articles']);
        Permission::create(['name' => 'update articles']);
        Permission::create(['name' => 'delete articles']);

        Permission::create(['name' => 'list charges']);
        Permission::create(['name' => 'view charges']);
        Permission::create(['name' => 'create charges']);
        Permission::create(['name' => 'update charges']);
        Permission::create(['name' => 'delete charges']);

        Permission::create(['name' => 'list cities']);
        Permission::create(['name' => 'view cities']);
        Permission::create(['name' => 'create cities']);
        Permission::create(['name' => 'update cities']);
        Permission::create(['name' => 'delete cities']);

        Permission::create(['name' => 'list companies']);
        Permission::create(['name' => 'view companies']);
        Permission::create(['name' => 'create companies']);
        Permission::create(['name' => 'update companies']);
        Permission::create(['name' => 'delete companies']);

        Permission::create(['name' => 'list countries']);
        Permission::create(['name' => 'view countries']);
        Permission::create(['name' => 'create countries']);
        Permission::create(['name' => 'update countries']);
        Permission::create(['name' => 'delete countries']);

        Permission::create(['name' => 'list currencies']);
        Permission::create(['name' => 'view currencies']);
        Permission::create(['name' => 'create currencies']);
        Permission::create(['name' => 'update currencies']);
        Permission::create(['name' => 'delete currencies']);

        Permission::create(['name' => 'list employees']);
        Permission::create(['name' => 'view employees']);
        Permission::create(['name' => 'create employees']);
        Permission::create(['name' => 'update employees']);
        Permission::create(['name' => 'delete employees']);

        Permission::create(['name' => 'list events']);
        Permission::create(['name' => 'view events']);
        Permission::create(['name' => 'create events']);
        Permission::create(['name' => 'update events']);
        Permission::create(['name' => 'delete events']);

        Permission::create(['name' => 'list otherapps']);
        Permission::create(['name' => 'view otherapps']);
        Permission::create(['name' => 'create otherapps']);
        Permission::create(['name' => 'update otherapps']);
        Permission::create(['name' => 'delete otherapps']);

        Permission::create(['name' => 'list phrases']);
        Permission::create(['name' => 'view phrases']);
        Permission::create(['name' => 'create phrases']);
        Permission::create(['name' => 'update phrases']);
        Permission::create(['name' => 'delete phrases']);

        Permission::create(['name' => 'list phrasecategories']);
        Permission::create(['name' => 'view phrasecategories']);
        Permission::create(['name' => 'create phrasecategories']);
        Permission::create(['name' => 'update phrasecategories']);
        Permission::create(['name' => 'delete phrasecategories']);

        Permission::create(['name' => 'list processes']);
        Permission::create(['name' => 'view processes']);
        Permission::create(['name' => 'create processes']);
        Permission::create(['name' => 'update processes']);
        Permission::create(['name' => 'delete processes']);

        Permission::create(['name' => 'list processfiles']);
        Permission::create(['name' => 'view processfiles']);
        Permission::create(['name' => 'create processfiles']);
        Permission::create(['name' => 'update processfiles']);
        Permission::create(['name' => 'delete processfiles']);

        Permission::create(['name' => 'list processfilestatuses']);
        Permission::create(['name' => 'view processfilestatuses']);
        Permission::create(['name' => 'create processfilestatuses']);
        Permission::create(['name' => 'update processfilestatuses']);
        Permission::create(['name' => 'delete processfilestatuses']);

        Permission::create(['name' => 'list processtypes']);
        Permission::create(['name' => 'view processtypes']);
        Permission::create(['name' => 'create processtypes']);
        Permission::create(['name' => 'update processtypes']);
        Permission::create(['name' => 'delete processtypes']);

        Permission::create(['name' => 'list allsettings']);
        Permission::create(['name' => 'view allsettings']);
        Permission::create(['name' => 'create allsettings']);
        Permission::create(['name' => 'update allsettings']);
        Permission::create(['name' => 'delete allsettings']);

        Permission::create(['name' => 'list townships']);
        Permission::create(['name' => 'view townships']);
        Permission::create(['name' => 'create townships']);
        Permission::create(['name' => 'update townships']);
        Permission::create(['name' => 'delete townships']);

        Permission::create(['name' => 'list workgroups']);
        Permission::create(['name' => 'view workgroups']);
        Permission::create(['name' => 'create workgroups']);
        Permission::create(['name' => 'update workgroups']);
        Permission::create(['name' => 'delete workgroups']);

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
