<?php

namespace App\Models\Sales;

use App\Models\MasterData\Product;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrderDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $args = ['table' => 'customer_order_details', 'field' => 'code', 'length' => 15, 'prefix' => 'ORPRD' . date('y') . date('m') . '-'];
            $model->code = IdGenerator::generate($args);
        });
    }
    
    public function get_product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    
    public function get_customer_order()
    {
        return $this->hasOne(CustomerOrder::class, 'id', 'customer_order_id');
    }
}
