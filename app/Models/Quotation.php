<?php

namespace App\Models;

use App\Models\MasterData\Status;
use App\Models\Sales\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_status()
    {
        return $this->belongsTo(Status::class, 'status', 'value');
    }

    public function get_detail()
    {
        return $this->hasMany(QuotationDetail::class, 'quotation_code', 'code');
    }

    public function get_customer()
    {
        return $this->belongsTo(Customer::class, 'customer_code', 'code');
    }
}
