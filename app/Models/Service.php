<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'service_price',
        'service_day',
        'created_at',
        'updated_at',
    ];

    public function orders(){
        return $this->hasOne(Order::class);
    }
}
