<?php

namespace App\Models\RawMaterial;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stone extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $args = ['table' => 'stones', 'field' => 'code', 'length' => 10, 'prefix' => 'STONE' . '-'];
            $model->code = IdGenerator::generate($args);
        });
    }

}
