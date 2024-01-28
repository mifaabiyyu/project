<?php

namespace App\Http\Livewire\Components\Modal\PermintaanSample;

use App\Models\MasterData\Product;
use App\Models\Sales\Customer;
use Livewire\Component;

class Add extends Component
{
    public $customers; 
    public $products = [];
    public $product  = [];
    public $qty     = [];
    public $dataProduct;
    public $address;

    public function hydrate()
    {
        $this->emit('select2');
    }

        
    protected $listeners = [
      'changeCustomers'
   ];

    public function mount()
    {
        $this->dataProduct = Product::all();

        $this->product[]    = '';
        $this->products[]   = [
            'jenis_product' => '',
            'qty'           => '',
        ];
    }

    public function render()
    {
        return view('livewire.components.modal.permintaan-sample.add');
    }

    public function addProduct()
    {
        $this->products[]   = [
            'jenis_product' => '',
            'qty'           => '',
        ];

        $this->product[]    = '';
    }


    public function deleteRow($index)
    {
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
