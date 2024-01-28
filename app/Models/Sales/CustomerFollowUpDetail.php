<?php

namespace App\Models\Sales;

use App\Models\MasterData\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerFollowUpDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function get_company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
