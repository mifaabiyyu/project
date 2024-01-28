<?php

namespace App\Http\Livewire\Components\Modal\Roles;

use Livewire\Component;

class Add extends Component
{
    public $permission_groups;
    public $permissions;


    public function render()
    {
        return view('livewire.components.modal.roles.add');
    }
}
