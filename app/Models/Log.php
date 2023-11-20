<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'log_id',
        'before_status',
        'after_status',
        'updated_at',
        'created_at',
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
