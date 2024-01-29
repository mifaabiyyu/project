<?php

namespace App\Models;

use App\Models\MasterData\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_product()
    {
        return $this->belongsTo(Product::class, 'product_code', 'code');
    }
}
