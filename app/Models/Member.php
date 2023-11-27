<?php

namespace App\Models;

use App\Models\Order;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Model;

class Member extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'total_point',
        'registration_date',
        'image',
    ];

    protected $hiddable = [
        'password',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
