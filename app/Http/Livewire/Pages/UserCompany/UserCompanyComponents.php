<?php

namespace App\Http\Livewire\Pages\UserCompany;

use App\Models\RolesCustomer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserCompanyComponents extends Component
{
    public function render()
    {
        $rolesCustomer  = RolesCustomer::all();
        $isCustomer      = Auth::user()->hasRole('Customer');
       
        $data = [
            'rolesCustomer' => $rolesCustomer,
            'isCustomer'    => $isCustomer
        ];

        return view('livewire.pages.user-company.user-company-components', $data)->layout('layouts.admin');
    }
}
