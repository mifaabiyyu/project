<?php

namespace App\Models\Mechanical;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RpmDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'rpm_machine' => 'array',
    ];
}
