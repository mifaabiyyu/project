<?php

namespace App\Http\Livewire\Pages\UserManagement;

use Livewire\Component;

class PermissionsComponents extends Component
{
    public function render()
    {
        return view('livewire.pages.user-management.permissions-components')->layout('layouts.admin');
    }
}
