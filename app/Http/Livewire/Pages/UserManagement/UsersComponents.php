<?php

namespace App\Http\Livewire\Pages\UserManagement;

use App\Models\Role;
use Livewire\Component;

class UsersComponents extends Component
{

    public function render()
    {
        $roles = Role::all();

        $data = [
            'roles' => $roles
        ];

        return view('livewire.pages.user-management.users-components', $data)->layout('layouts.admin');
    }
    
}
