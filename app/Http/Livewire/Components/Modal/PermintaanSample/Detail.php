<?php

namespace App\Http\Livewire\Components\Modal\PermintaanSample;

use App\Models\MasterData\Product;
use Livewire\Component;

class Detail extends Component
{
    public $customers; 
    public $products = [];
    public $product  = [];
    public $qty     = [];
    public $dataProduct;
    public $address;
    public $deleted = [];

    public function hydrate()
    {
        $this->emit('select2');
    }

    public function mount()
    {
        $this->dataProduct = Product::all();
       
    }

    protected $listeners = [
        'setValue'
    ]; 

    public function render()
    {
        return view('livewire.components.modal.permintaan-sample.detail');
    }

    public function setValue($arrayDetail)
    {
        $this->products = [];
        $this->qty      = [];
        $this->product  = [];

        foreach ($arrayDetail as $key => $value) {
            $this->products[]   = [
                'id'            => $value['id'],
                'status'        => 'old',
                'jenis_product' => $value['product'],
                'qty'           => $value['qty'],
                'type_of_goods' => $value['type_of_goods'],
            ];
    
            $this->product[]    = '';
        }
    }
}
