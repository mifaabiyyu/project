<?php

namespace App\Http\Livewire\Components\Modal\User;

use App\Models\Role;
use Livewire\Component;

class Add extends Component
{
    public $roles;

    public function render()
    {
        return view('livewire.components.modal.user.add');
    }
}
