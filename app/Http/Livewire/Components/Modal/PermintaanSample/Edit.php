<?php

namespace App\Http\Livewire\Components\Modal\PermintaanSample;

use App\Models\MasterData\Product;
use App\Models\Sales\Customer;
use Livewire\Component;

class Edit extends Component
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
        return view('livewire.components.modal.permintaan-sample.edit');
    }

    public function setValue($arrayDetail)
    {
        $this->products = [];
        $this->qty      = [];
        $this->product  = [];
        $this->deleted  = [];
        
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

    public function addProduct()
    {
        $this->products[]   = [
            'jenis_product' => '',
            'qty'           => '',
            'type_of_goods' => '',
            'id'            => 0,
            'status'        => 'new',
        ];

        $this->product[]    = '';
    }


    public function deleteRow($index)
    {
        if ($this->products[$index]['id'] != 0) {
            $this->deleted[]    = $this->products[$index]['id'];
        }

        unset($this->product[$index]);
        array_values($this->product);

        unset($this->products[$index]);
        $this->products = array_values($this->products);

        unset($this->qty[$index]);
        $this->qty = array_values($this->qty);
    }

    public function changeCustomers($value)
    {
        $findCustomer   = Customer::where('name', $value)->first();
        $this->address  = ' ';
        if ($findCustomer) {
            $this->address  = $findCustomer->address;
        }
    }
}
