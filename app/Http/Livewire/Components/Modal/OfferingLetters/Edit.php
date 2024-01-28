<?php

namespace App\Http\Livewire\Components\Modal\OfferingLetters;

use App\Models\OfferingLetterDetail;
use Livewire\Component;

class Edit extends Component
{
    public $productDetail;

    protected $listeners = [
        'setValue'
    ];

    public function mount()
    {
        $this->productDetail = 
        [
            [
                'id'            => '',
                'description_1' => '', 
                'description_2' => '', 
                'description_3' => '', 
                'description_4' => ''
            ],
           
        ];
    }

    public function render()
    {
        return view('livewire.components.modal.offering-letters.edit');
    }

    public function addDetail()
    {
        $this->productDetail[] = 
        [
            'id'            => '',
            'description_1' => '', 
            'description_2' => '', 
            'description_3' => '', 
            'description_4' => ''
        ];
    }

    public function deleteRow($index, $id)
    {
        $message = [
            'message' => 'Offering detail deleted successfully !'
        ];

        if ($id != 0) {
            $findData = OfferingLetterDetail::find($id);
            if (!$findData) {
                return $this->dispatchBrowserEvent('error', [
                    'message' => 'Offering detail not found !'
                ]);
            }

            $findData->delete();
        }

        unset($this->productDetail[$index]);
        array_values($this->productDetail);

        $this->dispatchBrowserEvent('success',$message);
    }

    public function setValue($data)
    {
        $this->productDetail = [ ];

        if(!is_null($data))
        
        foreach ($data as $value) {
            $this->productDetail[] =  
            [
                'id'            => $value['id'],
                'description_1' => $value["description_1"], 
                'description_2' => $value["description_2"], 
                'description_3' => $value["description_3"], 
                'description_4' => $value["description_4"]
            ];
        }
    }
}
