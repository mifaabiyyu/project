<?php

namespace App\Http\Livewire;

use App\Models\UserCompany;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        if (Auth::user()->hasRole('Customer')) {
            $getUser    = UserCompany::where('company', auth()->user()->company_id)->count();
        } else {
            $getUser    = UserCompany::count();
        }

        $data   = [
            'getUser'   => $getUser
        ];

        return view('livewire.dashboard', $data)->layout('layouts.admin');
    }
}
