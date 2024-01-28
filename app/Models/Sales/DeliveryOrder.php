<?php

namespace App\Models\Sales;

use App\Models\MasterData\City;
use App\Models\MasterData\Status;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_status()
    {
        return $this->belongsTo(Status::class, 'status', 'value');
    }

    public function get_customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'code');
    }

    public function get_customer_order()
    {
        return $this->belongsTo(CustomerOrder::class, 'customer_order_id', 'id');
    }

    public function get_delivery_detail()
    {
        return $this->hasMany(DeliveryOrderDetail::class, 'delivery_order_id', 'id')->with('get_customer_order_detail', 'get_product');
    }

    public function get_city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
