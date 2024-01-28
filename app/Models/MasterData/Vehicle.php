<?php

namespace App\Models\MasterData;

use App\Models\Logistik\Delivery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_status()
    {
        return $this->belongsTo(Status::class, 'status', 'value');
    }

    public function get_delivery()
    {
        return $this->hasMany(Delivery::class, 'vehicle_id', 'id');
    }
}
