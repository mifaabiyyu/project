<?php

namespace App\Http\Livewire\Components\Modal\Omset;

use Livewire\Component;

class Edit extends Component
{
    public $editOmset;

    protected $listeners = [
        'getDetail'
    ];

    public function render()
    {
        return view('livewire.components.modal.omset.edit');
    }

    public function getDetail($value)
    {
        $this->editOmset = $value;
    }
}
