<?php

namespace App\Models\Sales;

use App\Models\MasterData\Status;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerFollowUp extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $args = ['table' => 'customer_follow_ups', 'field' => 'code', 'length' => 14, 'prefix' => 'FLWUP' . date('y') . date('m') . '-'];
            $model->code = IdGenerator::generate($args);
        });
    }

    public function get_customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function get_status()
    {
        return $this->belongsTo(Status::class, 'status', 'value');
    }

    public function get_follow_up_detail()
    {
        return $this->hasMany(CustomerFollowUpDetail::class, 'customer_follow_up_id', 'id')->with('get_company');
    }
}
