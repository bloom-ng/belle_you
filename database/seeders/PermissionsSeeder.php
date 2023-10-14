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

        Permission::create(['name' => 'list blogcategories']);
        Permission::create(['name' => 'view blogcategories']);
        Permission::create(['name' => 'create blogcategories']);
        Permission::create(['name' => 'update blogcategories']);
        Permission::create(['name' => 'delete blogcategories']);

        Permission::create(['name' => 'list blogposts']);
        Permission::create(['name' => 'view blogposts']);
        Permission::create(['name' => 'create blogposts']);
        Permission::create(['name' => 'update blogposts']);
        Permission::create(['name' => 'delete blogposts']);

        Permission::create(['name' => 'list blogposttags']);
        Permission::create(['name' => 'view blogposttags']);
        Permission::create(['name' => 'create blogposttags']);
        Permission::create(['name' => 'update blogposttags']);
        Permission::create(['name' => 'delete blogposttags']);

        Permission::create(['name' => 'list blogtags']);
        Permission::create(['name' => 'view blogtags']);
        Permission::create(['name' => 'create blogtags']);
        Permission::create(['name' => 'update blogtags']);
        Permission::create(['name' => 'delete blogtags']);

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

        Permission::create(['name' => 'list contacts']);
        Permission::create(['name' => 'view contacts']);
        Permission::create(['name' => 'create contacts']);
        Permission::create(['name' => 'update contacts']);
        Permission::create(['name' => 'delete contacts']);

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

        Permission::create(['name' => 'list networkteams']);
        Permission::create(['name' => 'view networkteams']);
        Permission::create(['name' => 'create networkteams']);
        Permission::create(['name' => 'update networkteams']);
        Permission::create(['name' => 'delete networkteams']);

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

        Permission::create(['name' => 'list productimages']);
        Permission::create(['name' => 'view productimages']);
        Permission::create(['name' => 'create productimages']);
        Permission::create(['name' => 'update productimages']);
        Permission::create(['name' => 'delete productimages']);

        Permission::create(['name' => 'list quotes']);
        Permission::create(['name' => 'view quotes']);
        Permission::create(['name' => 'create quotes']);
        Permission::create(['name' => 'update quotes']);
        Permission::create(['name' => 'delete quotes']);

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

        Permission::create(['name' => 'list transactions']);
        Permission::create(['name' => 'view transactions']);
        Permission::create(['name' => 'create transactions']);
        Permission::create(['name' => 'update transactions']);
        Permission::create(['name' => 'delete transactions']);

        Permission::create(['name' => 'list uisettings']);
        Permission::create(['name' => 'view uisettings']);
        Permission::create(['name' => 'create uisettings']);
        Permission::create(['name' => 'update uisettings']);
        Permission::create(['name' => 'delete uisettings']);

        Permission::create(['name' => 'list userstorecredits']);
        Permission::create(['name' => 'view userstorecredits']);
        Permission::create(['name' => 'create userstorecredits']);
        Permission::create(['name' => 'update userstorecredits']);
        Permission::create(['name' => 'delete userstorecredits']);

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
