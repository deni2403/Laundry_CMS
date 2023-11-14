<?php

namespace App\Models;

use App\Models\Log;
use App\Models\Member;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'invoice',
        'customer_name',
        'order_in',
        'order_out',
        'order_take',
        'total_weight',
        'total_price',
        'status',
        'superadmin_id',
        'admin_id',
        'cashier_id',
        'ironer_id',
        'packer_id',
        'service_id',
        'member_id',
        'log_id',
        'created_at',
        'updated_at',
    ];

    public function logs(){
        return $this->belongsTo(Log::class);
    }

    public function members(){
        return $this->belongsTo(Member::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
