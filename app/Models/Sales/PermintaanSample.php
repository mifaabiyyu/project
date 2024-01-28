<?php

namespace App\Models\Sales;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanSample extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $args = ['table' => 'permintaan_samples', 'field' => 'code', 'length' => 14, 'prefix' => 'SAMPLE' . date('y') . date('m') . '-'];
            $model->code = IdGenerator::generate($args);
        });
    }

    public function get_detail()
    {
        return $this->hasMany(PermintaanSampleDetail::class, 'permintaan_sample_id', 'id');
    }

}
