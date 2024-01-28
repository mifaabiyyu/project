<?php

namespace App\Models\Logistik;

use App\Models\MasterData\Status;
use App\Models\MasterData\Vehicle;
use App\Models\Sales\Customer;
use App\Models\Sales\CustomerOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }

    public function get_order()
    {
        return $this->belongsTo(CustomerOrder::class, 'order_id', 'id');
    }

    public function get_status()
    {
        return $this->belongsTo(Status::class, 'status', 'value');
    }

    public function get_customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function get_detail()
    {
        return $this->hasMany(DeliveryDetail::class, 'delivery_id', 'id');
    }
}
