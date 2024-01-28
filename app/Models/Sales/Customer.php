<?php

namespace App\Models\Sales;

use App\Models\MasterData\City;
use App\Models\MasterData\Status;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_status()
    {
        return $this->belongsTo(Status::class, 'status', 'value');
    }

    public function get_city()
    {
        return $this->belongsTo(City::class, 'city', 'id');
    }

}
