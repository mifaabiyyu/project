<?php

namespace App\Http\Livewire\Components\Modal\PurchaseRequest;

use App\Models\Division;
use App\Models\MasterData\Employee;
use Livewire\Component;

class Add extends Component
{
    public $items = [];

    public function mount()
    {
        $this->items[]  = [];
    }

    public function render()
    {
        if (auth()->user()->hasRole('IT DSGM')) {
            $division   = Division::all();
        } else {
            $division   = Division::where('name', auth()->user()->roles->pluck('name')[0])->get();
        }

        $data   = [
            'divisions'  => $division
        ];

        return view('livewire.components.modal.purchase-request.add', $data);
    }

    public function addItem()
    {
        $this->items[]  = [];
    }

    public function deleteRow($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }
}
