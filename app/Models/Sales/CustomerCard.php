<?php

namespace App\Models\Sales;

use App\Models\MasterData\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCard extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function get_product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
