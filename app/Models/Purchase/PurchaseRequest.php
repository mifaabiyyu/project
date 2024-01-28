<?php

namespace App\Models\Purchase;

use App\Models\Division;
use App\Models\MasterData\Employee;
use App\Models\MasterData\Status;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $args = ['table' => 'purchase_requests', 'field' => 'code', 'length' => 12, 'prefix' => 'PR-' . date('y') . date('m') . '-'];
            $model->code = IdGenerator::generate($args);
        });
    }

    public function get_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function get_division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }

    public function get_status()
    {
        return $this->belongsTo(Status::class, 'status', 'value');
    }

    public function get_approval()
    {
        return $this->hasMany(PurchaseApproval::class, 'purchase_request_id', 'id');
    }

    public function get_employee()
    {
        return $this->belongsTo(Employee::class, 'name', 'applicant');
    }

    public function get_detail()
    {
        return $this->hasMany(PurchaseRequestDetail::class, 'purchase_request_id', 'id');
    }
}
