<?php

namespace App\Http\Livewire\Pages\UserManagement;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class RolesComponents extends Component
{
    public function render()
    {
        $all_permissions  = Permission::all();
        $permission_groups = User::getpermissionGroups();
        $data = [
            'permissions' => $all_permissions,
            'permission_groups'=> $permission_groups
        ];
        return view('livewire.pages.user-management.roles-components', $data)->layout('layouts.admin');
    }
}
