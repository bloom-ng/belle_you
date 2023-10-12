<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list addresses']);
        Permission::create(['name' => 'view addresses']);
        Permission::create(['name' => 'create addresses']);
        Permission::create(['name' => 'update addresses']);
        Permission::create(['name' => 'delete addresses']);

        Permission::create(['name' => 'list banners']);
        Permission::create(['name' => 'view banners']);
        Permission::create(['name' => 'create banners']);
        Permission::create(['name' => 'update banners']);
        Permission::create(['name' => 'delete banners']);

        Permission::create(['name' => 'list carousels']);
        Permission::create(['name' => 'view carousels']);
        Permission::create(['name' => 'create carousels']);
        Permission::create(['name' => 'update carousels']);
        Permission::create(['name' => 'delete carousels']);

        Permission::create(['name' => 'list carts']);
        Permission::create(['name' => 'view carts']);
        Permission::create(['name' => 'create carts']);
        Permission::create(['name' => 'update carts']);
        Permission::create(['name' => 'delete carts']);

        Permission::create(['name' => 'list categories']);
        Permission::create(['name' => 'view categories']);
        Permission::create(['name' => 'create categories']);
        Permission::create(['name' => 'update categories']);
        Permission::create(['name' => 'delete categories']);

        Permission::create(['name' => 'list contents']);
        Permission::create(['name' => 'view contents']);
        Permission::create(['name' => 'create contents']);
        Permission::create(['name' => 'update contents']);
        Permission::create(['name' => 'delete contents']);

        Permission::create(['name' => 'list invoices']);
        Permission::create(['name' => 'view invoices']);
        Permission::create(['name' => 'create invoices']);
        Permission::create(['name' => 'update invoices']);
        Permission::create(['name' => 'delete invoices']);

        Permission::create(['name' => 'list orders']);
        Permission::create(['name' => 'view orders']);
        Permission::create(['name' => 'create orders']);
        Permission::create(['name' => 'update orders']);
        Permission::create(['name' => 'delete orders']);

        Permission::create(['name' => 'list orderitems']);
        Permission::create(['name' => 'view orderitems']);
        Permission::create(['name' => 'create orderitems']);
        Permission::create(['name' => 'update orderitems']);
        Permission::create(['name' => 'delete orderitems']);

        Permission::create(['name' => 'list products']);
        Permission::create(['name' => 'view products']);
        Permission::create(['name' => 'create products']);
        Permission::create(['name' => 'update products']);
        Permission::create(['name' => 'delete products']);

        Permission::create(['name' => 'list productcategories']);
        Permission::create(['name' => 'view productcategories']);
        Permission::create(['name' => 'create productcategories']);
        Permission::create(['name' => 'update productcategories']);
        Permission::create(['name' => 'delete productcategories']);

        Permission::create(['name' => 'list reviews']);
        Permission::create(['name' => 'view reviews']);
        Permission::create(['name' => 'create reviews']);
        Permission::create(['name' => 'update reviews']);
        Permission::create(['name' => 'delete reviews']);

        Permission::create(['name' => 'list storesettings']);
        Permission::create(['name' => 'view storesettings']);
        Permission::create(['name' => 'create storesettings']);
        Permission::create(['name' => 'update storesettings']);
        Permission::create(['name' => 'delete storesettings']);

        Permission::create(['name' => 'list uisettings']);
        Permission::create(['name' => 'view uisettings']);
        Permission::create(['name' => 'create uisettings']);
        Permission::create(['name' => 'update uisettings']);
        Permission::create(['name' => 'delete uisettings']);

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
