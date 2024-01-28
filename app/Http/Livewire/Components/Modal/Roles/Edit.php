<?php

namespace App\Http\Livewire\Components\Modal\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public $permission_groups;
    public $permissions;

    public function render()
    {
        return view('livewire.components.modal.roles.edit');
    }
}
