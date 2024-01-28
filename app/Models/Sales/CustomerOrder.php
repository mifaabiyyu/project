<?php

namespace App\Models\Sales;

use App\Models\MasterData\City;
use App\Models\MasterData\Company;
use App\Models\MasterData\Status;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public static function boot()
    // {
    //     parent::boot();
    //     self::creating(function ($model) {
    //         $args = ['table' => 'customer_orders', 'field' => 'code', 'length' => 12, 'prefix' => 'ORD' . date('y') . date('m') . '-'];
    //         $model->code = IdGenerator::generate($args);
    //     });
    // }

    public function get_status()
    {
        return $this->belongsTo(Status::class, 'status', 'value');
    }

    public function get_customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id')->with('get_city');
    }

    public function get_city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function get_order_details()
    {
        return $this->hasMany(CustomerOrderDetail::class, 'customer_order_id', 'id')->with('get_product');
    }

    public function get_receive_address()
    {
        return $this->belongsTo(CustomerReceiveAddress::class, 'customer_receive_address_id', 'id');
    }
}
