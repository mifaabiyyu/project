<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function get_status()
    {
        return $this->belongsTo(Status::class, 'status', 'value');
    }
}
