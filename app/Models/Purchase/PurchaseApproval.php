<?php

namespace App\Models\Purchase;

use App\Models\MasterData\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseApproval extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_status()
    {
        return $this->belongsTo(Status::class, 'status', 'value');
    }
}
