<?php

namespace App\Models\Transportation;

use App\Models\MasterData\Vehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTransportation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }
}
