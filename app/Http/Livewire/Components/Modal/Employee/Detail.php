<?php

namespace App\Http\Livewire\Components\Modal\Employee;

use App\Models\Division;
use App\Models\MasterData\Company;
use Livewire\Component;

class Detail extends Component
{
    public function render()
    {
        $companies      = Company::all();
        $divisions      = Division::all();

        $data   = [
            'companies'     => $companies,
            'divisions'     => $divisions
        ];

        return view('livewire.components.modal.employee.detail', $data);
    }
}
