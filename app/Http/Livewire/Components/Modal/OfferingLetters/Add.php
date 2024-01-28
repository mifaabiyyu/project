<?php

namespace App\Http\Livewire\Components\Modal\OfferingLetters;

use App\Models\Sales\Customer;
use Livewire\Component;

class Add extends Component
{
    public $productDetail;

    public function mount()
    {
        $this->productDetail = 
        [
            [
                'description_1' => '', 
                'description_2' => '', 
                'description_3' => '', 
                'description_4' => ''
            ],
           
        ];
    }

    public function render()
    {
        $customerData  = Customer::all();

        $month = [
            [
                'id'    => '01',
                'name'  => 'Januari'
            ],
            [
                'id'    => '02',
                'name'  => 'Februari'
            ],
            [
                'id'    => '03',
                'name'  => 'Maret'
            ],
            [
                'id'    => '04',
                'name'  => 'April'
            ],
            [
                'id'    => '05',
                'name'  => 'Mei'
            ],
            [
                'id'    => '06',
                'name'  => 'Juni'
            ],
            [
                'id'    => '07',
                'name'  => 'Juli'
            ],
            [
                'id'    => '08',
                'name'  => 'Agustus'
            ],
            [
                'id'    => '09',
                'name'  => 'September'
            ],
            [
                'id'    => '10',
                'name'  => 'Oktober'
            ],
            [
                'id'    => '11',
                'name'  => 'November'
            ],
            [
                'id'    => '12',
                'name'  => 'Desember'
            ],
        ];
        $data = [
            'customerData'  => $customerData,
            'month'         => $month
        ];
        return view('livewire.components.modal.offering-letters.add', $data);
    }

    public function addDetail()
    {
        $this->productDetail[] = 
        [
            'description_1' => '', 
            'description_2' => '', 
            'description_3' => '', 
            'description_4' => ''
        ];
    }

    public function deleteRow($index)
    {
        unset($this->productDetail[$index]);
        array_values($this->productDetail);
    }
}
