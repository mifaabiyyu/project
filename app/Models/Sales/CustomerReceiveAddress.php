<?php

namespace App\Models\Sales;

use App\Models\MasterData\City;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerReceiveAddress extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $args = ['table' => 'customer_receive_addresses', 'field' => 'code', 'length' => 12, 'prefix' => 'CRA' . date('Y') . '-'];
            $model->code = IdGenerator::generate($args);
        });
    }

    public function get_city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
