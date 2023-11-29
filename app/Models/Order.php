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

    protected $guarded = ['id'];

    public function logs()
    {
        return $this->belongsTo(Log::class);
    }

    public function members()
    {
        return $this->belongsTo(Member::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ironerId()
    {
        return $this->belongsTo(User::class, 'ironer_id');
    }

    public function packerId()
    {
        return $this->belongsTo(User::class, 'packer_id');
    }

    public function cashierId()
    {
        return $this->belongsTo(User::class, 'cashier_id');
    }
}
