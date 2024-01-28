<?php

namespace App\Models\Sales;

use App\Models\MasterData\Product;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrderDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $args = ['table' => 'delivery_order_details', 'field' => 'code', 'length' => 12, 'prefix' => 'SJD' . date('y') . date('m') . '-'];
            $model->code = IdGenerator::generate($args);
        });
    }

    public function get_product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'code');
    }

    public function get_customer_order_detail()
    {
        return $this->belongsTo(CustomerOrderDetail::class, 'customer_order_detail_id', 'id');
    }

    public function get_delivery_order()
    {
        return $this->hasOne(DeliveryOrder::class, 'id', 'delivery_order_id');
    }
}
