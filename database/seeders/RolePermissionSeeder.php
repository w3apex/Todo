<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin    = Role::create(['name' => 'Super Admin','slug' => 'super-admin']);
        $roleAdmin         = Role::create(['name' => 'Admin','slug' => 'admin']);
        $roleManager       = Role::create(['name' => 'Client','slug' => 'manager']);

        /*
        DB::table('roles')->insert([
            'slug' => 'admin',
            'name' => 'Admin'
        ]);
        $rolePatient = Role::create(['name' => 'Patient','slug' => 'patient']);
        */

        //Permission List as array
        $permissions = [
            //Dashboard permissions
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view'
                ]
            ],
            // User Permission
            [
                'group_name' => 'users',
                'permissions' => [
                    'users.create',
                    'users.view',
                    'users.edit',
                    'users.delete',
                ]
            ],
            // Role Permission
            [
                'group_name' => 'roles',
                'permissions' => [
                    'roles.create',
                    'roles.view',
                    'roles.edit',
                    'roles.delete',
                ]
            ],
            // Post Permission
            [
                'group_name' => 'posts',
                'permissions' => [
                    'posts.view',
                    'posts.create',
                    'posts.edit',
                    'posts.delete',
                ]
            ],
            // Video Permission
            [
                'group_name' => 'videos',
                'permissions' => [
                    'videos.view',
                    'videos.create',
                    'videos.edit',
                    'videos.delete',
                ]
            ],
            // Tags Permission
            [
                'group_name' => 'tags',
                'permissions' => [
                    'tags.view',
                    'tags.create',
                    'tags.edit',
                    'tags.delete',
                ]
            ],
        ];

        //Create & Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) { 
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                //Create Permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
