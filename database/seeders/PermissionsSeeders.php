<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $permissions = [
    
    
                [
                    'group_name' => 'UserManagement',
                    'permissions' => [
                        // admin Permissions
                        'UserManagement.create',
                        'UserManagement.view',
                        'UserManagement.edit',
                        'UserManagement.delete',
                    ]
                ],
            ];
    
    
            for ($i = 0; $i < count($permissions); $i++) {
                $permissionGroup = $permissions[$i]['group_name'];
                for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                    // Create Permission
                    Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                }
            }
        }
    
    }
}
