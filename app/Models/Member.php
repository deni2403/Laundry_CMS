<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'total_point',
        'registration_date',
        'password',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
