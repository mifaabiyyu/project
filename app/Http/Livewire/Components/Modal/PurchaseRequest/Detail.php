<?php

namespace App\Http\Livewire\Components\Modal\PurchaseRequest;

use App\Models\Division;
use Livewire\Component;

class Detail extends Component
{
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

        return view('livewire.components.modal.purchase-request.detail', $data);
    }
}
